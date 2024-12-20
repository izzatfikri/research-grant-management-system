<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = User::where('userCategory', 'staff')->get();
        return view('staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'userCategory' => 'required|string|max:255',
            'staff_number' => 'required|string|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'userCategory' => 'staff',
            'staff_number' => $request->staff_number,
        ]);

        return redirect()->route('staffs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff = User::find($id);
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = User::find($id);
        return view('staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'staff_number' => 'required|string|unique:users,staff_number,'.$id,
        ]);

        $staff = User::find($id);
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->staff_number = $request->staff_number;

        $staff->save();

        return redirect()->route('staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = User::find($id);
        $staff->delete();
        return redirect()->route('staffs.index');
    }
}
