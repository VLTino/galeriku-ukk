<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GalleryController;

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

Route::get('/login',[LoginController::class,'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/reg',[UsersController::class,'index']);

Route::post('/reg',[UsersController::class,'store']);

Route::get('/',[GalleryController::class,'home']);

Route::middleware(['auth','UserAccess:user,admin'])->group(function () {
    Route::get('/logout',[LoginController::class,'logout']);
});
