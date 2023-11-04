<?php

use App\Http\Controllers\contactoController;
use App\Http\Controllers\directorioController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/directorio', [directorioController::class, 'index'])->name('directorio.index');

Route::get('/directorio/entrada', [directorioController::class, 'newEntrada'])->name('directorio.entrada');

Route::get('/directorio/destruir/{id}', [directorioController::class, 'destroy'])->name('directorio.destroy');

Route::get('/directorio/destruir/borrar/{id}', [directorioController::class, 'borrar'])->name('directorio.borrar');

Route::get('/directorio/buscar', [directorioController::class, 'buscar'])->name('directorio.buscar');

Route::get('/directorio/contactos/{id}', [directorioController::class, 'vercontacto'])->name('directorio.contacto');

Route::post('/directorio/crear/', [directorioController::class, 'create'])->name('directorio.create');

Route::post('/directorio/busqueda/', [directorioController::class, 'busqueda'])->name('directorio.busqueda');

Route::get('/directorio/contactos/agregar/{id}', [contactoController::class, 'agregar'])->name('contacto.agregar');

Route::get('/directorio/contactos/destroy/{id}', [contactoController::class, 'destroyContacto'])->name('contacto.destroy');

Route::post('/directorio/contactos/agregar/guardar', [contactoController::class, 'guardar'])->name('contacto.guardar');