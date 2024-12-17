<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Academician;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $user = Auth::user();
        $grants = Grant::whereHas('academicians', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                  ->where('role', 'leader');
        })->get();*/

        $grants = Grant::all();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grant $grant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        //
    }
}
