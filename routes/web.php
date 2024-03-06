<?php

use App\Http\Controllers\AdminController;
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
Route::get('/gallery/search',[GalleryController::class,'home']);

Route::middleware(['auth','UserAccess:user,admin'])->group(function () {
    Route::get('/logout',[LoginController::class,'logout']);
    Route::get('/upload',[GalleryController::class,'upload']);
    Route::post('/upload',[GalleryController::class,'store']);
    Route::get('/galeriku',[GalleryController::class,'index'])->name('galeriku');
    Route::get('/detail/{post:gambar}',[GalleryController::class,'detail']);
    Route::get('/edit/{post:gambar}',[GalleryController::class,'edit']);
    Route::post('/edit/{id:id_photo}',[GalleryController::class,'update']);
    Route::post('/delete/{id:id_photo}',[GalleryController::class,'destroy']);
    Route::post('/comments/{post}',[GalleryController::class,'storeComment']);
    Route::post('/like',[GalleryController::class,'likePhoto']);
    Route::get('/mylike',[GalleryController::class,'likesshow']);
    Route::get('/profile/{id:userid}',[UsersController::class,'show']);
    Route::post('/editprofile/{id:userid}',[UsersController::class,'editProfile']);
    Route::get('/userprofile/{id:userid}',[UsersController::class,'showprofile']);
    Route::post('/deletecomment/{idcomment:id_comment}',[GalleryController::class,'deletecomment']);
});

Route::middleware(['auth','UserAccess:admin'])->group(function () {
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/registeradmin',[AdminController::class,'regadmin']);
    Route::post('/regadmin',[AdminController::class,'store']);
    Route::get('/userdata',[AdminController::class,'user']);
    Route::post('/editlevel/{userid:userid}',[UsersController::class,'editlevel']);
    Route::post('/deleteuser/{userid:userid}',[UsersController::class,'destroy']);
});
