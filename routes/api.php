<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class, 'show']);
Route::get('lists/categories', [CategoryController::class, 'list']);
Route::post('categories', [CategoryController::class, 'store']);
Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

Route::get('products', [ProductController::class, 'index']);


