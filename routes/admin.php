<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminLoginController;
use App\Http\Controllers\admin\Category;
use App\Http\Controllers\admin\ProductController;
use App\Http\Middleware\ValidUser;

// Route::get('dashboard',[adminLoginController::class,'dashboard'])->name('dashboard')->middleware(ValidUser::class);
// Route::get('product',[adminLoginController::class,'product'])->name('product')->middleware(ValidUser::class);

Route::middleware([ValidUser::class])
    ->group(function () {
        Route::get('dashboard', [adminLoginController::class, 'dashboard'])->name('dashboard');
        Route::resource('product', ProductController::class);
        Route::resource('category', Category::class);
    });
