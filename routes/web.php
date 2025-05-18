<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminLoginController;


Route::get('admin/login',[adminLoginController::class,'index'])->name('login');
Route::post('/authenticate',[adminLoginController::class,'authenticate'])->name('authenticate');
Route::get('logout',[adminLoginController::class,'logout'])->name('logout');

