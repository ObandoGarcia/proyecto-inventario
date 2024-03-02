<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Projects;

class ProjectController extends Controller
{
    //Get all projects
    public function index(){
        $projects = Projects::join('state', 'projects.state_id', '=', 'state.id')
        ->select('projects.id', 'projects.name', 'projects.location', 'projects.manager', 'projects.start_date',
        'projects.end_date', 'projects.state_id', 'state.name as state_name')
        ->get();

        return view('projects.projects', compact('projects'));
    }
}
