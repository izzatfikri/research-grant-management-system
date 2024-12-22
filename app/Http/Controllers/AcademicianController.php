<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\User;
use Illuminate\Http\Request;

class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicians = Academician::all();
        return view('academicians.index', compact('academicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academicians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Step 1: Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'staff_number' => 'required|string|unique:academicians',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        // Step 2: Create User (for login credentials)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'userCategory' => 'academician',  
        ]);

        // Step 3: Create Academician (for additional details)
        $academician = Academician::create([
            'name' => $request->name,
            'staff_number' => $request->staff_number,
            'email' => $request->email,
            'college' => $request->college,
            'department' => $request->department,
            'position' => $request->position,
            'user_id' => $user->id,  // Link the user to the academician
        ]);

        // Step 4: Redirect or return a response
        return redirect()->route('academicians.index')->with('success', 'Academician Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academician $academician)
    {
        return view('academicians.show', compact('academician'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academician $academician)
    {
        return view('academicians.edit', compact('academician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academician $academician)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'staff_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:academicians,email,' . $academician->id,
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $academician->update($request->all());

        return redirect()->route('academicians.index')->with('success', 'Academician updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academician $academician)
    {
        $academician->delete();
        $academician->user->delete();  // Delete the user associated with the academician

        return redirect()->route('academicians.index')->with('success', 'Academician deleted successfully.');
    }
}
