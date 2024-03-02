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
}
