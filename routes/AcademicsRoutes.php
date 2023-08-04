<?php

use App\Http\Controllers\CoursesController;
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

Route::middleware(['auth', 'role:Jefes Academicos'])->group(function(){
    Route::get('/detecciones', [CoursesController::class, 'index'])->name('detecciones.index');
    Route::get('/detecciones/create', [CoursesController::class, 'create'])->name('detecciones.create');
    Route::post('/deteccion/guardado', [CoursesController::class, 'store'])->name('store.detecciones');
    Route::get('/deteccion/{id}', [CoursesController::class, 'show'])->name('show.detecciones');
    Route::get('/deteccion/editar/{id}', [CoursesController::class, 'edit'])->name('edit.detecciones');
    Route::put('/deteccion/actualizado/{id}', [CoursesController::class, 'update'])->name('update.detecciones');
    Route::get('/registros', [CoursesController::class, 'registros'])->name('index.registros');


    Route::get('/academicos/cursos', [CoursesController::class, 'index_cursos_academico'])->name('index.cursos.academicos');
    Route::get('/academicos/curso/{id}/inscritos', [CoursesController::class, 'index_curso_inscrito'])->name('show.inscritos.academicos');
});
