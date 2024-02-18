<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::view('/', 'welcome');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
