<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleDriveAuthController;



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

Route::get('/estado/solicitud/{id}', [App\Http\Controllers\VentaController::class, 'solicitud'])->name('estado.solicitud');

Route::get('/estado/presupuesto/{id}', [App\Http\Controllers\VentaController::class, 'presupuesto'])->name('estado.presupuesto');

Route::get('/estado/enviado/{id}', [App\Http\Controllers\VentaController::class, 'enviado'])->name('estado.enviado');

Route::get('/estado/confirmado/{id}', [App\Http\Controllers\VentaController::class, 'confirmado'])->name('estado.confirmado');

Route::get('/estado/finalizado/{id}', [App\Http\Controllers\VentaController::class, 'finalizado'])->name('estado.finalizado');

Route::get('/google/auth', [GoogleDriveAuthController::class, 'redirectToGoogle'])->name('google.auth');

Route::get('/google/callback', [GoogleDriveAuthController::class, 'handleCallback'])->name('google.callback');