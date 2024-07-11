<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('buku', DataController::class);

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/', [LoginController::class, 'create'])->name('login');
Route::post('/register-store', [RegisterController::class, 'store'])->name('register.store');
Route::post('/login-auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');