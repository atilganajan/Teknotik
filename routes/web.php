<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainCategoryController;

Auth::routes();

Route::get('/', [PageController::class, 'index'])->name('home');



Route::prefix('admin')->group(function () {
Route::resource("/product",ProductController::class);
Route::resource("/main-category",MainCategoryController::class);

})->name("product");