<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;
use Illuminate\View\ViewException;
use App\Http\Controllers\CartController;

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

// Ver productos existentes
Route::get('/admin/productosExistentes', [ProductController::class, 'showProductosExistentes'])->middleware('auth')->name('productosExistentes');

// CRUD productos
Route::get('/admin/formCrearProducto', [ViewController::class, 'showFormCrearProducto'])->middleware('auth')->name('viewFormCrearProducto');
Route::post('/admin/crearProducto', [ProductController::class, 'create'])->middleware('auth')->name('crearProducto');
Route::get('/admin/crearProducto/success', [ViewController::class, 'showProductoCreadoExitosamente'])->middleware('auth')->name('productoCreadoExitosamente');
Route::match(['put', 'patch'], '/admin/modificarProducto/{id}', [ProductController::class, 'modify'])->middleware('auth')->name('modificarProducto');
Route::delete( '/admin/eliminarProducto/{id}', [ProductController::class, 'delete'])->middleware('auth')->name('eliminarProducto');

// Carrito de compras
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart-add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart-index');
    Route::post('/cart/save-pedido', [CartController::class, 'savePedido'])->name('cart-save-pedido');
});


