<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtiquetaController;

Route::get('/etiquetasindex', [EtiquetaController::class, 'index'])->name('etiquetas-index');
Route::get('/etiquetascreate', [EtiquetaController::class, 'create'])->name('etiquetas-create');
Route::get('/etiquetasedit/{id}', [EtiquetaController::class, 'edit'])->name('etiquetas-edit');

Route::post('/etiquetasstore', [EtiquetaController::class, 'store'])->name('etiquetas-store');
Route::post('/etiquetassimplestore', [EtiquetaController::class, 'simpleStore'])->name('etiquetas-simple-store');
Route::patch('/etiquetasupdate/{id}', [EtiquetaController::class, 'update'])->name('etiquetas-update');
Route::delete('/etiquetasdestroy/{id}', [EtiquetaController::class, 'destroy'])->name('etiquetas-destroy');