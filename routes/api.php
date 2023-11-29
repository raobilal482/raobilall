<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('allproducts',[ProductsController::class,'getallproducts']);
Route::get('allproducts/sorted',[ProductsController::class,'sortedproducts']);
Route::get('singleproduct/{id}',[ProductsController::class,'getsingleproduct']);
Route::post('create/products',[ProductsController::class,'create']);
Route::put('update/products/{id}',[ProductsController::class,'update']);
Route::get('delete/products/{id}',[ProductsController::class,'delete']);
