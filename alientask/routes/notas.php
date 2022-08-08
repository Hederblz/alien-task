<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;


Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(NotaController::class)->group(function () {
        Route::get('/indice', 'index')->name('notas-indice');
        Route::get('/criar', 'create')->name('notas-criar');
        Route::post('/armazenar', 'store')->name('notas-armazenar');
        Route::get('/exibir/{id}', 'show')->name('notas-exibir');
        Route::get('/editar/{id}', 'edit')->name('notas-editar');
        Route::patch('/atualizar/{id}')->name('notas-atualizar');
        Route::delete('/excluir/{id}', 'destroy')->name('notas-excluir');
        Route::patch('/trancar/{id}', 'trancar')->name('notas-trancar');
        Route::patch('/destrancar/{id}', 'destrancar')->name('notas-destrancar');
    });

});