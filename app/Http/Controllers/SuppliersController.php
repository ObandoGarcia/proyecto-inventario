<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    //Get all suppliers
    public function index(){
        $suppliers = Suppliers::join('state', 'suppliers.state_id', '=', 'state.id')
        ->select('suppliers.id', 'suppliers.name', 'suppliers.phone', 'suppliers.email', 'state.name as state_name')
        ->where('suppliers.state_id', '=', 1)
        ->get();

        return view('suppliers.suppliers', compact('suppliers'));
    }

    //Inactive suppliers
    public function inactive(){
        $suppliers = Suppliers::join('state', 'suppliers.state_id', '=', 'state.id')
        ->select('suppliers.id', 'suppliers.name', 'suppliers.phone', 'suppliers.email', 'state.name as state_name')
        ->where('suppliers.state_id', '=', 2)
        ->get();

        return view('suppliers.inactive', compact('suppliers'));
    }

    //Update inactive suppliers
    public function change_state_suppliers($id){
        $supplier = Suppliers::find($id);
        $supplier->state_id = 2;
        $supplier->update();
        return back();
    }

    //Update active supplier
    public function change_state_to_active_suppliers($id){
        $supplier = Suppliers::find($id);
        $supplier->state_id = 1;
        $supplier->update();
        return back();
    }

    //Save data
    public function store(Request $request){
        $supplier = new Suppliers();
        $supplier->name = $request->post('supplier_name');
        $supplier->phone = $request->post('supplier_phone');
        $supplier->email = $request->post('supplier_email');
        $supplier->state_id = 1;
        $supplier->user_id = $request->post('user_id');
        $supplier->save();
        return redirect()->route('suppliers');
    }

    //Update data from database
    public function update(Request $request, $id){
        $supplier = Suppliers::find($id);
        $supplier->name = $request->post('supplier_name_update');
        $supplier->phone = $request->post('supplier_phone_update');
        $supplier->email = $request->post('supplier_email_update');
        $supplier->user_id = $request->post('user_id_update');
        $supplier->update();
        return back();
    }
}
