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


Route::get('/login_admin', [AdminController::class, 'show_login'])->name('admin.show_login');
Route::post('/do_login_admin', [AdminController::class, 'login'])->name('admin.login');
Route::get('/create_admin', [AdminController::class, 'show_create'])->name('admin.show_create');
Route::post('/create_user_admin', [AdminController::class,'create'])->name('admin.create');
Route::get('admin/administrar', [AdminController::class, 'show_administrar'])->name('admin.administrar');

Route::get('/login', [UserController::class, 'show_login'])->name('user.show_login');
Route::get('/create_user', [UserController::class, 'show_create'])->name('user.show_create');
Route::post('/do_login_user', [UserController::class, 'login'])->name('user.login');
Route::post('/create_user_normal', [UserController::class, 'create'])->name('user.create');
Route::get('/acesso/transacoes', [UserController::class, 'show_transacoes'])->name('user.transacoes');

Route::get('acesso/produtos', [ShopController::class, 'show_produtos'])->name('shop.produtos');
Route::get('acesso/produto/{id}', [ShopController::class, 'show_produto'])->name('shop.produto');
Route::post('/finalizar_compra/{id}', [ShopController::class, 'finalizar_compra'])->name('shop.buy');
Route::post('/calcular_cep', [ShopController::class, 'calcular_cep'])->name('frete.calcular');


