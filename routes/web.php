<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PDFController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('main');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/docente', [ProfileController::class, 'DocenteProfileCreate'])->name('docente.create');
    Route::put('/profile/docente/actualizado/{id}', [ProfileController::class, 'update_docente'])->name('update.docente');


    Route::post('/notificacion/leida', [NotificationController::class, 'markNotifications'])->name('markNotification');

    Route::prefix('pdf')->group(function () {
        Route::get('/deteccion', [PDFController::class, 'deteccion_pdf'])->name('pdf.deteccion');
        Route::get('/PIFDAP', [PDFController::class, 'PIFDAP_pdf'])->name('pdf.pifdap');
    });
});

require __DIR__.'/auth.php';

require __DIR__.'/AcademicsRoutes.php';

require __DIR__.'/DesarrolloRoutes.php';

require __DIR__.'/DocentesRoutes.php';
