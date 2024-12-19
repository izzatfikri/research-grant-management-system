<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grant;

class ProjectController extends Controller
{
    public function index()
    {
        $grants = Grant::all();

        return view('projects.index', compact('grants'));
    }
}
