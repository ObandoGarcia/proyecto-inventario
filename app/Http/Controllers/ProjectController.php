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

        $states = State::all();

        return view('projects.projects', compact('projects', 'states'));
    }

    //Save project
    public function store(Request $request){
        $project = new Projects();
        $project->name = $request->post('project_name');
        $project->location = $request->post('project_location');
        $project->manager = $request->post('project_manager');
        $project->start_date = $request->post('project_start_date');
        $project->end_date = $request->post('project_end_date');
        $project->state_id = $request->post('project_state_select');
        $project->user_id = $request->post('user_id');
        $project->save();

        return redirect()->route('projects');
    }

    //Edit project
    public function update(Request $request, $id){
        $project = Projects::find($id);
        $project->name = $request->post('project_name_update');
        $project->location = $request->post('project_location_update');
        $project->manager = $request->post('project_manager_update');
        $project->start_date = $request->post('project_start_date_update');
        $project->end_date = $request->post('project_end_date_update');
        $project->update();
        return back();
    }
}
