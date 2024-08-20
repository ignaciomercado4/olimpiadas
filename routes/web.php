<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\ViewController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\PedidosController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\VentasController;

    // Rutas sin autenticación
    Route::get('/register', [ViewController::class, 'showRegister'])->name('viewRegister');
    Route::post('/validar-registro', [RegisterController::class, 'register'])->name('validar-registro');
    Route::get('/login', [ViewController::class, 'showLogin'])->name('viewLogin');
    Route::post('/inicia-sesion', [RegisterController::class, 'login'])->name('inicia-sesion');

    Route::get('/logout', [RegisterController::class, 'logout'])->name('logout')->middleware('auth');

    // Rutas que requieren autenticación
    Route::middleware(['auth'])->group(function () {

        // Home
        Route::get('/', [ViewController::class, 'showHome'])->name('homepage');

        // Ver productos existentes
        Route::get('/productosExistentes', [ProductController::class, 'showProductosExistentes'])->name('productosExistentes');

        // CRUD productos
        Route::get('/formCrearProducto', [ViewController::class, 'showFormCrearProducto'])->name('viewFormCrearProducto');
        Route::post('/crearProducto', [ProductController::class, 'create'])->name('crearProducto');
        Route::get('/crearProducto/success', [ViewController::class, 'showProductoCreadoExitosamente'])->name('productoCreadoExitosamente');
        Route::match(['put', 'patch'], '/modificarProducto/{id}', [ProductController::class, 'modify'])->name('modificarProducto');
        Route::delete('/eliminarProducto/{id}', [ProductController::class, 'delete'])->name('eliminarProducto');

        // Carrito de compras
        Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart-add');
        Route::get('/cart', [CartController::class, 'viewCart'])->name('cart-index');
        Route::post('/cart/save-pedido', [CartController::class, 'savePedido'])->name('cart-save-pedido');

        // Pedidos
        Route::get('/pedidos', [PedidosController::class, 'showPedidos'])->name('viewPedidos');
        Route::match(['put', 'patch'], '/pedidos/{id}', [PedidosController::class, 'cambiarEstadoPedido'])->name('modificar-pedido');

        // Gestion usuarios
        Route::get('/usuarios', [UserController::class, 'showUsers'])->name('gestion-usuarios');
        Route::match(['put', 'patch'], '/modificarUsuario/{id}', [UserController::class, 'modify'])->name('modificar-usuario'); 

        // Ventas históricas
        Route::get('/ventas', [VentasController::class, 'showVentas'])->name('viewVentas');
    });
?>
