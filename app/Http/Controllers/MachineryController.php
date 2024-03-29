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
        ->where('machinery.state_id', '=', 1)
        ->get();

        //Get brands
        $brands = Brands::all();

        //Get suppliers
        $suppliers = Suppliers::all();


        return view('machinery.machinery', compact('machineries', 'brands', 'suppliers'));
    }

    //Get machineries with state in maintenance
    public function maintenance_machineries(){
        $machineries = Machinery::join('state', 'machinery.state_id', '=', 'state.id')
        ->join('brands', 'machinery.brand_id', '=', 'brands.id')
        ->join('suppliers', 'machinery.supplier_id', '=', 'suppliers.id')
        ->select('machinery.id', 'machinery.name', 'machinery.model', 'machinery.series', 'machinery.description',
        'machinery.amount', 'machinery.admission_date', 'machinery.state_id', 'state.name as state_name', 'available',
        'machinery.brand_id', 'brands.name as brand_name', 'machinery.supplier_id',
        'suppliers.name as suppliers_name')
        ->where('machinery.state_id', '=', 3)
        ->get();

        return view('machinery.maintenance', compact('machineries'));
    }

    //Get machineries with inactive state
    public function inactive_machineries(){
        $machineries = Machinery::join('state', 'machinery.state_id', '=', 'state.id')
        ->join('brands', 'machinery.brand_id', '=', 'brands.id')
        ->join('suppliers', 'machinery.supplier_id', '=', 'suppliers.id')
        ->select('machinery.id', 'machinery.name', 'machinery.model', 'machinery.series', 'machinery.description',
        'machinery.amount', 'machinery.admission_date', 'machinery.state_id', 'state.name as state_name', 'available',
        'machinery.brand_id', 'brands.name as brand_name', 'machinery.supplier_id',
        'suppliers.name as suppliers_name')
        ->where('machinery.state_id', '=', 2)
        ->get();

        return view('machinery.inactive', compact('machineries'));
    }

    //Save data
    public function store(Request $request){
        $machinery = new Machinery();
        $machinery->name = $request->post('machinery_name');
        $machinery->model = $request->post('machinery_model');
        $machinery->series = $request->post('machinery_serie');
        $machinery->description = $request->post('machinery_description');
        $machinery->amount = 1;
        $machinery->admission_date = $request->post('machinery_date');
        $machinery->state_id = 1;
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
        $machinery->admission_date = $request->post('machinery_date_update');
        $machinery->brand_id = $request->post('machinery_brand_update');
        $machinery->supplier_id = $request->post('machinery_supplier_update');
        $machinery->user_id = $request->post('user_id_update');
        $machinery->update();
        return back();
    }

    //Update state to active
    public function change_state_to_active($id){
        $machinery = Machinery::find($id);
        $machinery->state_id = 1;
        $machinery->available = true;
        $machinery->update();
        return back();
    }

    //Update state to inactive
    public function change_state_machinery_to_inactive($id){
        $machinery = Machinery::find($id);
        $machinery->state_id = 2;
        $machinery->available = false;
        $machinery->update();
        return back();
    }

    //Update state to maintenance
    public function change_state_machinery_to_maintenance($id){
        $machinery = Machinery::find($id);
        $machinery->state_id = 3;
        $machinery->available = false;
        $machinery->update();
        return back();
    }
}

