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

Route::get('/estado/solicitud/{id}', [App\Http\Controllers\VentaController::class, 'solicitud'])->name('estado.solicitud')->middleware('auth');

Route::get('/estado/presupuesto/{id}', [App\Http\Controllers\VentaController::class, 'presupuesto'])->name('estado.presupuesto')->middleware('auth');

Route::get('/estado/enviado/{id}', [App\Http\Controllers\VentaController::class, 'enviado'])->name('estado.enviado')->middleware('auth');

Route::get('/estado/confirmado/{id}', [App\Http\Controllers\VentaController::class, 'confirmado'])->name('estado.confirmado')->middleware('auth');

Route::get('/estado/finalizado/{id}', [App\Http\Controllers\VentaController::class, 'finalizado'])->name('estado.finalizado')->middleware('auth');

Route::post('upload-photo/{ventaId}', [App\Http\Controllers\GoogleDriveAuthController::class, 'uploadPhoto'])->name('upload.photo')->middleware('auth');

Route::get('ventas-solicitudes', [App\Http\Controllers\VentaController::class, 'ventasSolicitudes'])->name('ventas.solicitudes')->middleware('auth');
Route::get('ventas-presupuestos', [App\Http\Controllers\VentaController::class, 'ventasPresupuestos'])->name('ventas.presupuestos')->middleware('auth');
Route::get('ventas-enviados-al-cliente', [App\Http\Controllers\VentaController::class, 'ventasEnviados'])->name('ventas.enviados')->middleware('auth');
Route::get('ventas-confirmados', [App\Http\Controllers\VentaController::class, 'ventasConfirmados'])->name('ventas.confirmados')->middleware('auth');
Route::get('ventas-finalizados', [App\Http\Controllers\VentaController::class, 'ventasFinalizados'])->name('ventas.finalizados')->middleware('auth');




Route::get('/estado/solicitud2/{id}', [App\Http\Controllers\VentaController::class, 'solicitud'])->name('estado.solicitud2')->middleware('auth');

Route::get('/estado/presupuesto2/{id}', [App\Http\Controllers\VentaController::class, 'presupuesto'])->name('estado.presupuesto2')->middleware('auth');

Route::get('/estado/enviado2/{id}', [App\Http\Controllers\VentaController::class, 'enviado'])->name('estado.enviado2')->middleware('auth');

Route::get('/estado/confirmado2/{id}', [App\Http\Controllers\VentaController::class, 'confirmado'])->name('estado.confirmado2')->middleware('auth');

Route::get('/estado/finalizado2/{id}', [App\Http\Controllers\VentaController::class, 'finalizado'])->name('estado.finalizado2')->middleware('auth');


Route::get('/whatsapp/{id}', [App\Http\Controllers\VentaController::class, 'whatsappComprobante'])->name('whatsappComprobante')->middleware('auth');

Route::get('/comprobante/{id}', [App\Http\Controllers\VentaController::class, 'comprobante'])->name('comprobante');