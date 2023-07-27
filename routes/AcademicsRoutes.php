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
    Route::get('/registros', [CoursesController::class, 'registros'])->name('index.registros');

});
