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

Route::get('/', [App\Http\Controllers\VentaController::class, 'index'])->name('home')->middleware('auth');


Auth::routes();

Route::resource('ventas', App\Http\Controllers\VentaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/ventas/create2', [App\Http\Controllers\VentaController::class, 'create2'])->name('ventas.create2')->middleware('auth');

