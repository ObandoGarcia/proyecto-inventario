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
Route::get('inactive_brands', [BrandsController::class, 'inactive'])->name('inactive_brands')->middleware('auth');
Route::put('change_state/{id}', [BrandsController::class, 'change_state'])->name('change_state')->middleware('auth');
Route::put('change_state_to_active_brands/{id}', [BrandsController::class, 'change_state_to_active'])->name('change_state_to_active_brands')->middleware('auth');

//State routes
Route::get('state', [StateController::class, 'index'])->name('state')->middleware('auth');

//Suppliers route
Route::get('suppliers', [SuppliersController::class, 'index'])->name('suppliers')->middleware('auth');
Route::post('create_suppliers', [SuppliersController::class, 'store'])->name('create_suppliers')->middleware('auth');
Route::put('update_suppliers/{id}', [SuppliersController::class, 'update'])->name('update_suppliers')->middleware('auth');
Route::get('inactive_suppliers', [SuppliersController::class, 'inactive'])->name('inactive_suppliers')->middleware('auth');
Route::put('change_state_suppliers/{id}', [SuppliersController::class, 'change_state_suppliers'])->name('change_state_suppliers')->middleware('auth');
Route::put('change_state_to_active_suppliers/{id}', [SuppliersController::class, 'change_state_to_active_suppliers'])->name('change_state_to_active_suppliers')->middleware('auth');

//Machinery routes
Route::get('machineries', [MachineryController::class, 'index'])->name('machineries')->middleware('auth');
Route::post('create_machineries', [MachineryController::class, 'store'])->name('create_machineries')->middleware('auth');
Route::put('update_machineries/{id}', [MachineryController::class, 'update'])->name('update_machineries')->middleware('auth');
Route::put('update_machineries_state/{id}', [MachineryController::class, 'update_state'])->name('update_machineries_state')->middleware('auth');
Route::put('change_state_machinery_to_inactive/{id}', [MachineryController::class, 'change_state_machinery_to_inactive'])->name('change_state_machinery_to_inactive')->middleware('auth');
Route::put('change_state_machinery_to_maintenance/{id}', [MachineryController::class, 'change_state_machinery_to_maintenance'])->name('change_state_machinery_to_maintenance')->middleware('auth');
Route::put('change_state_to_active/{id}', [MachineryController::class, 'change_state_to_active'])->name('change_state_to_active')->middleware('auth');
Route::get('inactive_machineries', [MachineryController::class, 'inactive_machineries'])->name('inactive_machineries')->middleware('auth');
Route::get('maintenance_machineries', [MachineryController::class, 'maintenance_machineries'])->name('maintenance_machineries')->middleware('auth');

//Project route
Route::get('projects', [ProjectController::class, 'index'])->name('projects')->middleware('auth');
Route::post('create_project', [ProjectController::class, 'store'])->name('create_project')->middleware('auth');
Route::put('update_project/{id}', [ProjectController::class, 'update'])->name('update_project')->middleware('auth');
Route::put('change_state_projects_to_completed/{id}', [ProjectController::class, 'change_state_projects_to_completed'])->name('change_state_projects_to_completed')->middleware('auth');
Route::put('change_state_projects_to_cancel/{id}', [ProjectController::class, 'change_state_projects_to_cancel'])->name('change_state_projects_to_cancel')->middleware('auth');
Route::put('change_state_projects_to_pause/{id}', [ProjectController::class, 'change_state_projects_to_pause'])->name('change_state_projects_to_pause')->middleware('auth');



