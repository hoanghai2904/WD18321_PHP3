<?php

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
