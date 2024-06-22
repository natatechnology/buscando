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

// Route::get('/', function () { return view('welcome'); });

Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('/');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/admin/desaparecidos', [App\Http\Controllers\DesaparecidosController::class, 'index'])->name('admin.desaparecidos.index');
    Route::get('/admin/desaparecidos/nuevo', [App\Http\Controllers\DesaparecidosController::class, 'create'])->name('admin.desaparecidos.create');
    Route::post('/admin/desaparecidos/nuevo', [App\Http\Controllers\DesaparecidosController::class, 'store'])->name('admin.desaparecidos.store');
    Route::get('/admin/desaparecidos/editar/{id}', [App\Http\Controllers\DesaparecidosController::class, 'edit'])->name('admin.desaparecidos.edit');
    Route::put('/admin/desaparecidos/editar/{id}/guardar-cambios', [App\Http\Controllers\DesaparecidosController::class, 'update'])->name('admin.desaparecidos.update');
    Route::get('/admin/desaparecidos/ver/{id}', [App\Http\Controllers\DesaparecidosController::class, 'show'])->name('admin.desaparecidos.show');
    Route::get('/admin/desaparecidos/eliminar/{id}', [App\Http\Controllers\DesaparecidosController::class, 'destroy'])->name('admin.desaparecidos.delete');

});
