<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
    Route::get('/add-post', [PostController::class, 'show'])->name('add-post');
    Route::post('/add-post', [PostController::class, 'addPost'])->name('post.add-post');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

Route::get('/home', [PostController::class, 'index'])->name('home.index');
Route::get('/add-post', [PostController::class, 'showAddPost'])->name('post.add-post');
Route::get('/post/{id}', [PostController::class, 'showPost'])->name('post.show-post');




