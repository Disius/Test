<?php

use App\Http\Controllers\CoordinacionController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\GestionParametrosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'role:Jefe del Departamento de Desarrollo Academico|Coordinacion de FD y AP'])->group(function(){
    Route::get('/configuracion', [GestionParametrosController::class, 'edit'])->name('parametros.edit');
//    Rutas de carrera
    Route::get('/crear/carrera', [GestionParametrosController::class, 'create_carrera'])->name('create.carrera');
    Route::post('/guardar/carrera', [GestionParametrosController::class, 'store_carrera'])->name('store.carrera');
    Route::get('/editar/carrera/{id}', [GestionParametrosController::class, 'edit_carrera'])->name('edit.carrera');
    Route::put('/actualizar/carrera/{id}', [GestionParametrosController::class, 'update_carrera'])->name('update.carrera');
//    Rutas de departamento
    Route::get('/crear/departamento', [GestionParametrosController::class, 'create_departamento'])->name('create.departamento');
    Route::post('/departamento/creado', [GestionParametrosController::class, 'store_departamento'])->name('store.departamento');
    Route::get('/departamento/editar/{id}', [GestionParametrosController::class, 'edit_departamento'])->name('edit.departamento');
    Route::put('/departamento/actualizado/{id}', [GestionParametrosController::class, 'update_departamento'])->name('update.departamento');


    Route::middleware('role:Coordinacion de FD y AP')->group(function (){
        Route::get('/detecciones', [CoordinacionController::class, 'index'])->name('index.detecciones');
        Route::get('/detecciones/deteccion/{id}', [CoordinacionController::class, 'show'])->name('show.Cdetecciones');
    });
});
