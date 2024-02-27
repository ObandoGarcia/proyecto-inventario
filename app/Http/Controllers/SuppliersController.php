<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    //Get all suppliers
    public function index(){
        $suppliers = Suppliers::all();
        return view('suppliers.suppliers', compact('suppliers'));
    }

    //Save data
    public function store(Request $request){
        $supplier = new Suppliers();
        $supplier->name = $request->post('supplier_name');
        $supplier->phone = $request->post('supplier_phone');
        $supplier->email = $request->post('supplier_email');
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
