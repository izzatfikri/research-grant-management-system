<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Academician;

class AdminController extends Controller
{

    public function index(){
       //
    }

    public function create(){
        return view('admin.create-academician');
    }

    public function createAcademician(Request $request)
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
            'password' => bcrypt($request->password),  // Hash the password
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
        return redirect()->back()->with('success', 'Project Leader Created Successfully');
    }
}
