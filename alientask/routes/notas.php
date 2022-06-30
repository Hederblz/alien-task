<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;

Route::get('/notasindex', [NotaController::class, 'index'])->name('notas-index');
Route::get('/notasshow/{id}', [NotaController::class, 'show'])->name('notas-show');
Route::get('/notascreate', [NotaController::class, 'create'])->name('notas-create');
Route::get('/notasshow/{id}', [NotaController::class, 'show'])->name('notas-show');
Route::get('/notasedit/{id}', [NotaController::class, 'edit'])->name('notas-edit');

Route::post('/notasstore', [NotaController::class, 'store'])->name('notas-store');
Route::patch('/notasupdate/{id}', [NotaController::class, 'update'])->name('notas-update');
Route::patch('/notastrancar/{id}', [NotaController::class, 'trancar'])->name('notas-trancar');
Route::delete('/notasdestroy/{id}', [NotaController::class, 'destroy'])->name('notas-destroy');