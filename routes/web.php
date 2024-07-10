<?php

use App\Http\Controllers\Lab2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\thongtinController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/**/  
// Route::get('/test', function () {
//     echo('123');
// });

Route::get('/list-user', [UserController::class, 'showUser']);

// Params
// http://127.0.0.1:8000/list-user?id=1&name=hai;
Route::get('/update-user', [UserController::class, 'updateUser']);


// slug
// http://127.0.0.1:8000/list-user/1
Route::get('/get-user/{id}/{name?}', [UserController::class, 'getUser']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/thong-tin', [thongtinController::class,'thongTin']);


// http://127.0.0.1:8000/users/list-user/
// Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
//     Route::get('list-user',[UserController::class,'listUsers'])->name('listUsers');
//     // add sp
//     Route::get('add-user',[UserController::class,'addUsers'])->name('addUsers');
//     Route::post('add-user',[UserController::class,'addPostUsers'])->name('addPostUsers');

//     // delete sp
//     Route::get('delete-user/{idUser}',[UserController::class,'deleteUsers'])->name('deleteUsers');

//     //update sp
//     Route::get('edit-user/{idUser}', [UserController::class, 'editUser'])->name('editUser');
//     Route::put('update-user/{idUser}', [UserController::class, 'updateUsers'])->name('updateUsers');
// });    

Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
    Route::get('list-product',[Lab2Controller::class, 'listProduct'])->name('listProduct');

    Route::get('add-product',[Lab2Controller::class, 'addProduct'])->name('addProduct');
    Route::post('add-product',[Lab2Controller::class,'addPostProduct'])->name('addPostProduct');

    Route::get('delete-product/{idProduct}', [Lab2Controller::class,'deleteProduct'])->name('deleteProduct');

    Route::get('edit-product/{idProduct}', [Lab2Controller::class, 'editProduct'])->name('editProduct');
    Route::put('update-product/{idProduct}', [Lab2Controller::class, 'updateProducts'])->name('updateProducts');

    Route::get('search-product', [Lab2Controller::class, 'searchProduct'])->name('searchProduct');
});