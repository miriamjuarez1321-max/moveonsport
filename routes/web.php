<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PrendaController;
use App\Models\Prenda;

Route::get('/', function () {
    $trendingProducts = Prenda::latest()->take(5)->get();
    // Obtener productos para el carrusel (más populares o aleatorios)
    $carouselProducts = Prenda::inRandomOrder()->take(6)->get();
    return view('home', compact('trendingProducts', 'carouselProducts'));
})->name('home');

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/* Autenticación */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.post')->middleware('guest');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

/* Rutas de Recuperación de Contraseña */

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;

/* Rutas de Administración */
Route::middleware(['auth', 'admin', 'block.direct'])->prefix('admin')->name('admin.')->group(function () {
    // Gestión de Usuarios
    Route::get('/usuarios', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/usuarios/{user}', [AdminUserController::class, 'show'])->name('users.show');
    Route::patch('/usuarios/{user}/toggle', [AdminUserController::class, 'toggleStatus'])->name('users.toggle');
    Route::delete('/usuarios/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // Gestión de Productos
    Route::get('/productos', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/productos/{prenda}', [AdminProductController::class, 'show'])->name('products.show');
    Route::get('/productos/{prenda}/editar', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::patch('/productos/{prenda}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/productos/{prenda}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Gestión de Pedidos (Transferencias)
    Route::get('/pedidos', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/pedidos/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::post('/pedidos/{order}/approve', [AdminOrderController::class, 'approve'])->name('orders.approve');
    Route::post('/pedidos/{order}/reject', [AdminOrderController::class, 'reject'])->name('orders.reject');
    Route::patch('/pedidos/{order}/shipping', [AdminOrderController::class, 'updateShipping'])->name('orders.update_shipping');
});

/* Rutas de Prendas (Protegidas) */
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/prendas/create', [PrendaController::class, 'create'])->name('prendas.create');
    Route::post('/prendas', [PrendaController::class, 'store'])->name('prendas.store');
});

/* Rutas Legales y Footer (Públicas) */
Route::get('/privacidad', function () {
    return view('legal.privacidad');
})->name('legal.privacidad');

Route::get('/devoluciones', function () {
    return view('legal.devoluciones');
})->name('legal.devoluciones');

Route::get('/terminos', function () {
    return view('legal.terminos');
})->name('legal.terminos');

/* NOSOTROS Y CONTACTO (Públicas) */
Route::get('/nosotros', function () {
    return view('nosotros.index');
})->name('nosotros');

Route::get('/contacto', function () {
    return view('contacto.index');
})->name('contacto');

use App\Http\Controllers\Auth\ForgotPasswordController;

/* Rutas de Recuperación de Contraseña (Públicas) */
Route::get('/password/recuperar', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/recuperar', [ForgotPasswordController::class, 'sendRecoveryCode'])->name('password.email');
Route::get('/password/verificar', [ForgotPasswordController::class, 'showVerifyForm'])->name('password.verify.form');
Route::post('/password/verificar', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify');
Route::get('/password/restablecer', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/password/restablecer', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

/* 🛍️ PRODUCTOS Y COLECCIONES (Públicas para NAVEGAR y EXPLORAR) */
Route::get('/colecciones', [PrendaController::class, 'index'])->name('collections');

Route::get('/colecciones/hombre', function () {
    $categoria = request()->query('categoria');
    $query = Prenda::where('categoria', 'hombre');
    if ($categoria && $categoria !== 'Todos') $query->where('tipo', $categoria);
    $prendas = $query->latest()->get();
    return view('collections.hombre', compact('prendas', 'categoria'));
})->name('collections.hombre');

Route::get('/colecciones/mujer', function () {
    $categoria = request()->query('categoria');
    $query = Prenda::where('categoria', 'mujer');
    if ($categoria && $categoria !== 'Todos') $query->where('tipo', $categoria);
    $prendas = $query->latest()->get();
    return view('collections.mujer', compact('prendas', 'categoria'));
})->name('collections.mujer');

Route::get('/colecciones/accesorios', function () {
    $categoria = request()->query('categoria');
    $query = Prenda::where('categoria', 'accesorios');
    if ($categoria && $categoria !== 'Todos') $query->where('tipo', $categoria);
    $prendas = $query->latest()->get();
    return view('collections.accesorios', compact('prendas', 'categoria'));
})->name('collections.accesorios');

/* Acción Pública (Valida auth de todos modos e invoca 302 en vez de 401) */
Route::post('/carrito', [CartController::class, 'add'])->name('cart.add');

/* Ruta del Producto Mismo (Cualquiera la ve, pero NO TIPEDEADA, block.direct lo impide) */
Route::middleware('block.direct')->group(function () {
    Route::get('/productos/{prenda}', [PrendaController::class, 'show'])->name('products.show');
});

Route::post('/productos/comentario', [\App\Http\Controllers\ComentarioController::class, 'store'])->name('comentarios.store')->middleware('auth');

/* 🔒 RUTAS PROTEGIDAS (AUTENTICACIÓN REQUERIDA + BLOCK.DIRECT PARA NO TIPEAR) */
Route::middleware(['auth', 'block.direct'])->group(function () {
    
    /* PERFIL Y PEDIDOS */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/mis-pedidos', [\App\Http\Controllers\UserOrderController::class, 'index'])->name('orders.index');
    Route::post('/mis-pedidos/{order}/comprobante', [\App\Http\Controllers\UserOrderController::class, 'uploadComprobante'])->name('orders.upload_comprobante');

    /* RUTAS CARRITO INTERNAS (Ya logueado) */
    Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
    Route::patch('/carrito/{carrito}', [CartController::class, 'update'])->name('cart.update')->withoutMiddleware(['block.direct']);
    Route::delete('/carrito/{carrito}', [CartController::class, 'remove'])->name('cart.remove')->withoutMiddleware(['block.direct']);

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process')->withoutMiddleware(['block.direct']);
    Route::get('/checkout/pago/{order}/{method}', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::get('/checkout/exito/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/stripe/success/{order}', [CheckoutController::class, 'stripeSuccess'])->name('checkout.stripe.success')->withoutMiddleware(['block.direct']);
    Route::get('/checkout/paypal/success/{order}', [CheckoutController::class, 'paypalSuccess'])->name('checkout.paypal.success')->withoutMiddleware(['block.direct']);

});







