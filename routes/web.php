<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/',[FrontendController::class,'index'])->name('root');


// dashboard routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// profile

Route::get("/home/profile",[ProfileController::class,'index'])->name('home.profile');



