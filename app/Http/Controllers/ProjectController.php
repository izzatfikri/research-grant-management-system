<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function index()
    {

        if(Gate::allows('isAcademician')){
            $grants = Grant::whereHas('academicians', function ($query) {
                $query->where('user_id', Auth::user()->id)
                      ->where('role', 'member');
            })->get();
        }
        else {
            $grants = Grant::all();
        }

        return view('projects.index', compact('grants'));
    }
    public function show(Grant $grant)
    {
        // Tunjuk project member
        $members = $grant->academicians()->wherePivot('role', 'member')->get();
        $milestones = $grant->milestones()->get();
        return view('projects.show', compact('grant', 'members', 'milestones'));
    }
}
