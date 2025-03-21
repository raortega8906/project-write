<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas Proyectos
Route::get('/proyectos', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/proyectos/crear', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/proyectos', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/proyectos/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Rutas Documentos

require __DIR__.'/auth.php';
