<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;
use App\Models\Grant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Gate::allows('isAcademician')){
            $grants = Grant::whereHas('academicians', function ($query) {
                $query->where('user_id', Auth::id())
                      ->where(function ($query) {
                          $query->where('role', 'like', '%member%')
                                ->orWhere('role', 'like', '%leader%');
                      });
            })->get();
        
            $milestones = Milestone::whereIn('grant_id', $grants->pluck('id')->toArray())->get();
        }
        elseif(Gate::allows('staffAdmin')){
            $milestones = Milestone::all();
        }
        
        return view('milestones.index', compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grants = Grant::all();
        return view('milestones.create', compact('grants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'milestone_title' => 'required|string|max:255',
            'completion_date' => 'required|date',
            'deliverable' => 'required|string',
            'status' => 'required|string',
            'remarks' => 'required|string',
            'grant_id' => 'required|exists:grants,id',
        ]);

        Milestone::create($validated);

        return redirect()->back()->with('success', 'Milestone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        return view('milestones.show', compact('milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        return view('milestones.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $validated = $request->validate([
            'status' => 'required|string',
            'remarks' => 'required|string',
        ]);

        $milestone->update($validated);

        return redirect()->back()->with('success', 'Milestone updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();
        return redirect()->route('milestones.index')->with('success', 'Milestone deleted successfully.');
    }

    public function dashboard(){
        $milestoneCounts = Milestone::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->pluck('total', 'status');

        // Ensure both statuses are represented in the data
        $data = [
            'Pending' => $milestoneCounts->get('Pending', 0),
            'Completed' => $milestoneCounts->get('Completed', 0),
        ];

        return view('charts.pie', compact('data'));
    }


}
