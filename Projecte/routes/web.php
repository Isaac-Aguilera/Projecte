<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VotController;
use App\Http\Controllers\ValoracioController;

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

Route::get('/video/{id}', [VideoController::class, 'index'])->name('video');

Route::get('/user/{nick}', [UserController::class, 'index'])->name('user');

Route::post('/vot', [VotController::class, 'store'])->name('vot');
Route::delete('/vot', [VotController::class, 'destroy'])->name('vot');

Route::get('/search', [VideoController::class, 'search'])->name('search');

Route::get('/user/{nick}/videos', [UserController::class, 'uservid'])->name('uservid');

Route::get('/user/{nick}/info', [UserController::class, 'userinfo'])->name('userinfo');

Route::get('/user/{nick}/search', [UserController::class, 'usersearch'])->name('usersearch');

Route::post('/valoracio', [ValoracioController::class, 'store'])->name('valoracio');