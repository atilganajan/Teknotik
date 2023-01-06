<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentAndRating;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\OrderController;

Auth::routes();

Route::get('/', [PageController::class, 'index'])->name('home')->middleware("finishAt");
Route::get('/product/{id}', [PageController::class, 'productDetail'])->name('productDetail')->middleware("finishAt");


Route::group(["middleware" => ["auth","finishAt"], "prefix" => "user"], function () {
    // Cart Start
    Route::get("/cart", [CartController::class, "index"])->name("cart.index");
    Route::post("/cart/add-to-cart/{id}", [CartController::class, "addToCart"])->name("cart.addToCart");
    Route::get("/cart/remove-cart-item-one/{id}", [CartController::class, "removeCartItemOne"])->name("cart.removeCartItemOne");
    Route::get("/cart/remove-cart-item/{id}", [CartController::class, "removeCartItem"])->name("cart.removeCartItem");
    // Cart End

    // Order Start
    Route::get("/order", [OrderController::class, "index"])->name("order.index");
    Route::post("/order", [OrderController::class, "createOrder"])->name("order.createOrder");
    // Order End

    Route::post("/product/questionComment/{id}", [CommentAndRating::class, "questionComment"])->name("product.questionComment");
    Route::post("/product/ratingComment/{id}", [CommentAndRating::class, "ratingComment"])->name("product.ratingComment");

});

Route::group(["middleware" => ["auth", "isAdmin", "finishAt"], "prefix" => "admin"], function () {
    
    Route::get("/order", [OrderController::class, "adminIndex"])->name("order.adminIndex");
    Route::get("/order/detail/{id}", [OrderController::class, "adminOrderDetail"])->name("order.adminOrderDetail");
    Route::put("/order/status/update/{id}", [OrderController::class, "adminOrderStatusUpdate"])->name("order.adminOrderStatusUpdate");

    Route::post("/product/resComment/{id}", [CommentAndRating::class, "resComment"])
    ->name("product.resComment");
    Route::delete("/product/questionComment/delete/{id}", [CommentAndRating::class, "deleteQuestionComment"])
    ->name("product.deleteQuestionComment");
    Route::delete("/product/ratingComment/delete/{id}", [CommentAndRating::class, "deleteRatingComment"])
    ->name("product.deleteRatingComment");

    Route::resource("/product", ProductController::class);
    Route::resource("/main-category", MainCategoryController::class);
    Route::resource("/sub-category", SubCategoryController::class);
});
