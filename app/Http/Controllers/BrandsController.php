<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    //Get all brands
    public function index(){
        $brands = Brands::all();
        return view('brands.brands', compact('brands'));
    }

    //Save data
    public function store(Request $request){
        $brand = new Brands();
        $brand->name = $request->post('brand_name');
        $brand->user_id = $request->post('user_id');
        $brand->save();
        return redirect()->route('brands');
    }

    //Update data from form to database
    public function update(Request $request, $id){
        $brand = Brands::find($id);
        $brand->user_id = $request->post('user_id_update');
        $brand->name = $request->post('brand_name_update');
        $brand->update();
        return back();
    }
}
