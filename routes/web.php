<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\MachineryController;
use App\Http\Controllers\ProjectController;

//General routes
Route::view('/', 'welcome');
Route::view('register', 'register')->name('register')->middleware('guest');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');

//Session routes
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
Route::post('register', [LoginController::class, 'register']);

//Brands routes
Route::get('brands', [BrandsController::class, 'index'])->name('brands')->middleware('auth');
Route::post('create_brands', [BrandsController::class, 'store'])->name('create_brands')->middleware('auth');
Route::put('update_brands/{id}', [BrandsController::class, 'update'])->name('update_brands')->middleware('auth');

//State routes
Route::get('state', [StateController::class, 'index'])->name('state')->middleware('auth');
Route::post('create_states', [StateController::class, 'store'])->name('create_states')->middleware('auth');
Route::put('update_states/{id}', [StateController::class, 'update'])->name('update_states')->middleware('auth');

//Suppliers route
Route::get('suppliers', [SuppliersController::class, 'index'])->name('suppliers')->middleware('auth');
Route::post('create_suppliers', [SuppliersController::class, 'store'])->name('create_suppliers')->middleware('auth');
Route::put('update_suppliers/{id}', [SuppliersController::class, 'update'])->name('update_suppliers')->middleware('auth');

//Machinery routes
Route::get('machineries', [MachineryController::class, 'index'])->name('machineries')->middleware('auth');
Route::post('create_machineries', [MachineryController::class, 'store'])->name('create_machineries')->middleware('auth');
Route::put('update_machineries/{id}', [MachineryController::class, 'update'])->name('update_machineries')->middleware('auth');
Route::put('update_machineries_state/{id}', [MachineryController::class, 'update_state'])->name('update_machineries_state')->middleware('auth');
Route::delete('delete_machineries/{id}', [MachineryController::class, 'delete'])->name('delete_machineries')->middleware('auth');


//Project route
Route::get('projects', [ProjectController::class, 'index'])->name('projects')->middleware('auth');
