<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    //Get all brands
    public function index(){
        $brands = Brands::join('state', 'brands.state_id', '=', 'state.id')
        ->select('brands.id', 'brands.name', 'state.name as state_name')
        ->where('brands.state_id', '=', 1)
        ->get();

        return view('brands.brands', compact('brands'));
    }

    //Inactive brands
    public function inactive(){
        $brands = Brands::join('state', 'brands.state_id', '=', 'state.id')
        ->select('brands.id', 'brands.name', 'state.name as state_name')
        ->where('brands.state_id', '=', 2)
        ->get();

        return view('brands.inactive', compact('brands'));
    }

    //Update inactive brands
    public function change_state($id){
        $brand = Brands::find($id);
        $brand->state_id = 2;
        $brand->update();
        return back();
    }

    //Update active brand
    public function change_state_to_active($id){
        $brand = Brands::find($id);
        $brand->state_id = 1;
        $brand->update();
        return back();
    }

    //Save data
    public function store(Request $request){
        $brand = new Brands();
        $brand->name = $request->post('brand_name');
        $brand->state_id = 1;
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
