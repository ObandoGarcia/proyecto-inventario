<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machinery;
use App\Models\Suppliers;
use App\Models\State;
use App\Models\Brands;

class MachineryController extends Controller
{
    //Get all machineries
    public function index(){

        //Get machineries
        $machineries = Machinery::join('state', 'machinery.state_id', '=', 'state.id')
        ->join('brands', 'machinery.brand_id', '=', 'brands.id')
        ->join('suppliers', 'machinery.supplier_id', '=', 'suppliers.id')
        ->select('machinery.id', 'machinery.name', 'machinery.model', 'machinery.series', 'machinery.description',
        'machinery.amount', 'machinery.admission_date', 'machinery.state_id', 'state.name as state_name', 'available',
        'machinery.brand_id', 'brands.name as brand_name', 'machinery.supplier_id',
        'suppliers.name as suppliers_name')
        ->orderBy('machinery.admission_date')
        ->get();

        //Get states
        $state = State::all();

        //Get brands
        $brands = Brands::all();

        //Get suppliers
        $suppliers = Suppliers::all();


        return view('machinery.machinery', compact('machineries', 'state', 'brands', 'suppliers'));
    }

    //Save data
    public function store(Request $request){
        $machinery = new Machinery();
        $machinery->name = $request->post('machinery_name');
        $machinery->model = $request->post('machinery_model');
        $machinery->series = $request->post('machinery_serie');
        $machinery->description = $request->post('machinery_description');
        $machinery->amount = $request->post('machinery_amount');
        $machinery->admission_date = $request->post('machinery_date');
        $machinery->state_id = $request->post('machinery_state');
        $machinery->available = true;
        $machinery->brand_id = $request->post('machinery_brand');
        $machinery->supplier_id = $request->post('machinery_supplier');
        $machinery->user_id = $request->post('user_id');
        $machinery->save();
        return redirect()->route('machineries');
    }

    //Update data from database
    public function update(Request $request, $id){
        $machinery = Machinery::find($id);
        $machinery->name = $request->post('machinery_name_update');
        $machinery->model = $request->post('machinery_model_update');
        $machinery->series = $request->post('machinery_serie_update');
        $machinery->description = $request->post('machinery_description_update');
        $machinery->amount = $request->post('machinery_amount_update');
        $machinery->admission_date = $request->post('machinery_date_update');
        $machinery->brand_id = $request->post('machinery_brand_update');
        $machinery->supplier_id = $request->post('machinery_supplier_update');
        $machinery->user_id = $request->post('user_id_update');
        $machinery->update();
        return back();
    }

    //Update state
    public function update_state(Request $request, $id){
        $machinery = Machinery::find($id);
        $machinery->state_id = $request->post('machinery_state_update');
        $machinery->update();
        return back();
    }
}

