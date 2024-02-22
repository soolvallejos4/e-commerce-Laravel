<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Defino las rutas de mi api.

Route::get('products', [\App\Http\Controllers\API\ProductsAdminController::class, 'index'])
    ->middleware(['auth']);

Route::get('products/{id}', [\App\Http\Controllers\API\ProductsAdminController::class, 'view'])
    ->middleware(['auth']);


Route::post('products', [\App\Http\Controllers\API\ProductsAdminController::class, 'create'])
    ->middleware(['auth']);

