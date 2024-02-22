<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');


Route::get('/quienes-somos', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');

//Autenticacion
Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'formLogin'])
    ->name('auth.formLogin');
Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogin'])
    ->name('auth.processLogin');
Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogout'])
    ->name('auth.processLogout');

Route::get('/registro', [\App\Http\Controllers\AuthController::class, 'formRegister'])
    ->name('auth.formRegister');
Route::post('/registro', [\App\Http\Controllers\AuthController::class, 'processRegister'])
    ->name('auth.processRegister');




/** RUTEO ABM CORRESPONDIENTE A LAS NOTICIAS */

Route::get('/noticias', [\App\Http\Controllers\NewsController::class, 'index'])
    ->name('news');

Route::get('/noticias/{id}', [\App\Http\Controllers\NewsController::class, 'view'])
    ->name('news.view');


/** RUTEO ABM CORRESPONDIENTE A LOS PRODUCTOS */
Route::get('/productos/listado', [\App\Http\Controllers\ProductsController::class, 'index'])
    ->name('products.index');

Route::get('/productos/{id}', [\App\Http\Controllers\ProductsController::class, 'view'])
    ->name('products.view');

Route::post('/productos/{id}/reservar', [\App\Http\Controllers\ProductsReservationController::class, 'processReservation'])
    ->name('products.processReservation')
    ->middleware('auth');

Route::post('/productos/{id}/comprar', [\App\Http\Controllers\UserController::class, 'buyProduct'])
    ->name('products.processBuy')
    ->middleware('auth');



/*Usuario*/


// Rutas para el perfil del usuario
Route::get('/profile', [\App\Http\Controllers\UserController::class, 'showProfile'])
    ->name('profile.show');
Route::get('/profile/edit', [\App\Http\Controllers\UserController::class, 'editProfile'])
    ->name('profile.edit');
Route::put('/profile', [\App\Http\Controllers\UserController::class, 'updateProfile'])
    ->name('profile.update');




/*admin*/



Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth')
    ->middleware('user-role:1');


Route::get('/admin/productos', [\App\Http\Controllers\ProductsController::class, 'index'])
    ->name('admin.products')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::get('/admin/noticias', [\App\Http\Controllers\NewsController::class, 'index'])
    ->name('admin.news')
    ->middleware('auth')
    ->middleware('user-role:1');

    Route::get('/admin/product-statistics',[\App\Http\Controllers\ProductsController::class, 'productStatistics'])
    ->name('admin.productStatistics')
    ->middleware('auth'); // Asegurar que el usuario esté autenticado


Route::get('/admin/usuarios', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('admin.users')
    ->middleware('auth')
    ->middleware('user-role:1');


Route::get('/admin/productos/nuevo', [\App\Http\Controllers\ProductsController::class, 'formNew'])
    ->name('admin.products.formNew')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::post('/admin/productos/nuevo', [\App\Http\Controllers\ProductsController::class, 'processNew'])
    ->name('admin.products.processNew')
    ->middleware('auth')
    ->middleware('user-role:1');


Route::get('/admin/noticias/nueva', [\App\Http\Controllers\NewsController::class, 'formNew'])
    ->name('admin.news.formNew')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::post('/admin/noticias/nueva', [\App\Http\Controllers\NewsController::class, 'processNew'])
    ->name('admin.news.processNew')
    ->middleware('auth')
    ->middleware('user-role:1');



Route::get('/admin/productos/{id}', [\App\Http\Controllers\ProductsController::class, 'view'])
    ->name('admin.products.view')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::get('/admin/noticias/{id}', [\App\Http\Controllers\NewsController::class, 'view'])
    ->name('admin.news.view')
    ->middleware('auth')
    ->middleware('user-role:1');


Route::get('/admin/productos/{id}/eliminar', [\App\Http\Controllers\ProductsController::class, 'confirmDelete'])
    ->name('admin.products.confirmDelete')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::post('/admin/productos/{id}/eliminar', [\App\Http\Controllers\ProductsController::class, 'processDelete'])
    ->name('admin.products.processDelete')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::get('/admin/noticias/{id}/eliminar', [\App\Http\Controllers\NewsController::class, 'confirmDelete'])
    ->name('admin.news.confirmDelete')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::post('/admin/noticias/{id}/eliminar', [\App\Http\Controllers\NewsController::class, 'processDelete'])
    ->name('admin.news.processDelete')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::get('/admin/productos/{id}/editar', [\App\Http\Controllers\ProductsController::class, 'formEdit'])
    ->name('admin.products.formEdit')
    ->middleware('auth')
    ->middleware('user-role:1');
Route::post('/admin  /productos/{id}/editar', [\App\Http\Controllers\ProductsController::class, 'processEdit'])
    ->name('admin.products.processEdit')
    ->middleware('auth')
    ->middleware('user-role:1');

Route::get('/admin/noticias/{id}/editar', [\App\Http\Controllers\NewsController::class, 'formEdit'])
    ->name('admin.news.formEdit')
    ->middleware('auth')
    ->middleware('user-role:1');
Route::post('/admin/noticias/{id}/editar', [\App\Http\Controllers\NewsController::class, 'processEdit'])
    ->name('admin.news.processEdit')
    ->middleware('auth')
    ->middleware('user-role:1');





/**
 * Mercado Pago
 */

Route::get('mp/test', [\App\Http\Controllers\MercadoPagoController::class, 'show'])
    ->name('mp.test');
Route::get('mp/test-v2', [\App\Http\Controllers\MercadoPagoController::class, 'showV2'])
    ->name('mp.test2')
    ->middleware('auth');



    
Route::get('mp/success', [\App\Http\Controllers\MercadoPagoController::class, 'processSuccess'])
    ->name('mp.success')
    ->middleware('auth');

    
Route::get('mp/pending', [\App\Http\Controllers\MercadoPagoController::class, 'processPending'])
    ->name('mp.pending')
    ->middleware('auth');

Route::get('mp/failure', [\App\Http\Controllers\MercadoPagoController::class, 'processFailure'])
    ->name('mp.failure');




    Route::post('/cart/add/{product}', [\App\Http\Controllers\CartController::class, 'addItem'])
    ->name('cart.addItem')
    ->middleware('auth');

Route::post('/cart/update', [\App\Http\Controllers\CartController::class, 'update'])
    ->name('cart.update')
    ->middleware('auth');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'viewCart'])
    ->name('cart.view')
    ->middleware('auth');

    Route::get('/cart/remove/{product}', [\App\Http\Controllers\CartController::class, 'remove'])
    ->name('cart.remove')
    ->middleware('auth');

    Route::post('/cart/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])
    ->name('cart.checkout')
    ->middleware('auth');