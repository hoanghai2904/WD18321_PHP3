<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
use App\Http\Controllers\Api\ProductController;

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
// hiển thị danh sách product
Route::get('list-product',[ProductController::class,'listProduct']);
// hiển thị danh sách chi tiết product
Route::get('get-product/{idProduct}',[ProductController::class,'getProduct']);
// hiển thị thêm product
Route::post('add-product',[ProductController::class,'addProduct']);
// update product
Route::put('update-product',[ProductController::class,'updateProduct']);
// delete product
Route::delete('delete-product',[ProductController::class,'deleteProduct']);
