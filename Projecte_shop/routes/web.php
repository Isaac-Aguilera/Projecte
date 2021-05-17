<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProducteController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/config', [UserController::class, 'edit'])->name('config');
Route::post('/config', [UserController::class, 'update'])->name('config');

Route::get('/config/password', [UserController::class, 'password'])->name('configPassword');
Route::post('/config/password', [UserController::class, 'updatePassword'])->name('configPassword');

Route::get('/pujarProducte', [ProducteController::class, 'create'])->name('pujarProducte');
Route::post('/pujarProducte', [ProducteController::class, 'store'])->name('pujarProducte');
Route::get('/editarProducte/{id}', [ProducteController::class, 'edit'])->name('editarProducte');
Route::post('/editarProducte/{id}', [ProducteController::class, 'update'])->name('editarProducte');

Route::get('/search', [ProducteController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
