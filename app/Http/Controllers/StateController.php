<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    //Get all states
    public function index(){
        $state = State::all();
        return view('states.state', compact('state'));
    }

    //Save data
    public function store(Request $request){
        $state = new State();
        $state->name = $request->post('state_name');
        $state->save();
        return redirect()->route('state');
    }

    //Update data from form to database
    public function update(Request $request, $id){
        $state = State::find($id);
        $state->name = $request->post('state_name_update');
        $state->update();
        return back();
    }

}
