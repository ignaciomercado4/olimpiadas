<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ViewController;


// Home
Route::get('/', [ViewController::class, 'showHome'])->middleware('auth')->name('homepage');

// Rutas de registro
Route::get('/register', [ViewController::class, 'showRegister'])->name('viewRegister');
Route::post('/validar-registro', [RegisterController::class, 'register'])->name('validar-registro');

// Rutas de login
Route::get('/login', [ViewController::class, 'showLogin'])->name('viewLogin');
Route::post('/inicia-sesion', [RegisterController::class, 'login'])->name('inicia-sesion');

// Logout
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');


