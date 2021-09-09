<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login_admin', [AdminController::class, 'show_login']);

Route::get('/create_admin', [AdminController::class, 'show_create']);


Route::get('/login', [UserController::class, 'show_login']);
Route::get('/create_user', [UserController::class, 'show_create_user']);


Route::get('/produtos', [ShopController::class, 'show_produtos']);

//Route::get('/produto/{id}', function ($id) {
//    return [ShopController::class, 'show_produto'];
//});

Route::get('/finalizar_compra', [ShopController::class, 'show_finalizar_compra']);