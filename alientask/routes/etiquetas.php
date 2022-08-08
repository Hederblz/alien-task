<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtiquetaController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(EtiquetaController::class)->group(function () {
        Route::get('/indice', 'index')->name('etiquetas-indice');
        Route::get('/criar', 'create')->name('etiquetas-criar');
        Route::post('/armazenar', 'store')->name('etiquetas-armazenar');
        Route::post('/armazenarSimples', 'simplestore')->name('etiquetas-armazenarSimples');
        Route::get('/editar/{id}', 'edit')->name('etiquetas-editar');
        Route::patch('/atualizar/{id}', 'update')->name('etiquetas-atualizar');
        Route::delete('/excluir/{id}', 'destroy')->name('etiquetas-exluir');
    });
});