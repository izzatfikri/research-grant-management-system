<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Academician;
use App\Models\Milestone;
use Illuminate\Support\Facades\Gate;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(Gate::allows('isAcademician')){
            $grants = Grant::whereHas('academicians', function ($query) {
                $query->where('user_id', Auth::user()->id)
                      ->where('role', 'leader');
            })->get();
        } else {
            $grants = Grant::all();
        }

        //$user = Auth::user();
        /*$grants = Grant::whereHas('academicians', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->where('role', 'leader');
        })->get();*/

        //$grants = Grant::all();

        return view('grants.index', compact('grants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicians = Academician::all();
        return view('grants.create', compact('academicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grant_amount' => 'required|numeric',
            'grant_provider' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'project_description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'duration' => 'required|numeric',
            'leader' => 'required|exists:academicians,id',
            'members' => 'array',
            'members.*' => 'exists:academicians,id',
        ]);
    
        // Create a new grant
        $grant = Grant::create([
            'grant_amount' => $request->grant_amount,
            'grant_provider' => $request->grant_provider,
            'project_title' => $request->project_title,
            'project_description' => $request->project_description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $request->duration,
        ]);

        // Attach the project leader to the grant
        $grant->academicians()->attach($request->leader, ['role' => 'leader']);

        // Attach the project members to the grant with role as member
        if ($request->has('members')) {
        foreach ($request->members as $member) {
            $grant->academicians()->attach($member, ['role' => 'member']);
        }
    }

        // Redirect to the grants index page with a success message
        return redirect()->route('grants.index')->with('success', 'Grant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
        // Tunjuk projec member
        $members = $grant->academicians()->wherePivot('role', 'member')->get();
        $milestones = $grant->milestones()->get();
        return view('grants.show', compact('grant', 'members', 'milestones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        $members = $grant->academicians()->wherePivot('role', 'member')->get();
        $allAcademicians = Academician::all(); // Assuming you want to list all academicians for selection
        return view('grants.edit', compact('grant', 'members', 'allAcademicians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grant $grant)
    {
        $validated = $request->validate([
            'grant_amount' => 'required|numeric',
            'grant_provider' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'project_description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'duration' => 'required|numeric',
            'members' => 'array', // Changed from 'required|array' to 'array' to allow only leader
        ]);
    
        // **Important:** Remove the following line to allow the method to continue
        // return $request->members;
    
        // Retrieve selected member IDs from the request. Defaults to an empty array if none are selected.
        $selectedMemberIds = $request->input('members', []);
    
        // Prepare sync data with roles
        $syncData = [];
    
        foreach ($selectedMemberIds as $memberId) {
            $syncData[$memberId] = ['role' => 'member'];
        }
    
        // Retrieve the current leader
        $leader = $grant->academicians()->wherePivot('role', 'leader')->first();
    
        if ($leader) {
            // Ensure the leader is always included in the sync data with the role 'leader'
            $syncData[$leader->id] = ['role' => 'leader'];
        }
    
        // Sync project members with roles. This will:
        // - Add new members
        // - Update roles of existing members
        // - Remove members not present in $syncData (except the leader)
        $grant->academicians()->sync($syncData);
    
        // Update the grant with validated data
        $grant->update($validated);
    
        // Redirect to the grants index page with a success message
        return redirect()->route('grants.index')->with('success', 'Grant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        $grant->delete();
        // Redirect to the grants index page with a success message
        return redirect()->route('grants.index')->with('success', 'Grant deleted successfully.');
    }
}
