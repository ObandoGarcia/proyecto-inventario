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
}
