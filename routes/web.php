<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [AuthController::class, "login"])->name('login');
Route::post("/auth", [AuthController::class, "authenticate"]);
Route::get("/register", [AuthController::class, "register"]);
Route::post("/register", [AuthController::class, "create_user"]);

Route::middleware(['auth'])->group(function () {

    Route::post("/logout", [AuthController::class, "logout"]);

    Route::get("/dashboard", [DashboardController::class, "index"]);

    Route::get("/product", [ProductController::class, "index"]);
    Route::get("/product/create", [ProductController::class, "create"]);
    Route::post("/product/create", [ProductController::class, "store"]);
    Route::get("/product/update/{id}", [ProductController::class, "edit"]);
    Route::put("/product/update/{id}", [ProductController::class, "update"]);
    Route::delete("/product/{id}", [ProductController::class, "destroy"]);


    Route::get("/category", [CategoryController::class, "index"]);
    Route::get("/category/create", [CategoryController::class, "create"]);
    Route::get("/category/update/{id}", [CategoryController::class, "edit"]);
    Route::put("/category/update/{id}", [CategoryController::class, "update"]);
    Route::delete("/category/{id}", [CategoryController::class, "destroy"]);
    Route::post("/category", [CategoryController::class, "store"]);

});
