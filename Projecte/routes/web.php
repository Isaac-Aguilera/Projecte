<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name("home");;

Auth::routes();


Route::get('/config', [UserController::class, 'edit'])->name('config');
Route::post('/config', [UserController::class, 'update'])->name('config');

Route::get('/config/password', [UserController::class, 'password'])->name('configPassword');
Route::post('/config/password', [UserController::class, 'updatePassword'])->name('configPassword');

Route::get('/pujarVideo', [VideoController::class, 'create'])->name('pujarVideo');
Route::post('/pujarVideo', [VideoController::class, 'store'])->name('pujarVideo');