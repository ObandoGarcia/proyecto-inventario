<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\StateController;

//General routes
Route::view('/', 'welcome');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');

//Session routes
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

//Brands routes
Route::get('brands', [BrandsController::class, 'index'])->middleware('auth');

//State routes
Route::get('state', [StateController::class, 'index'])->middleware('auth');
