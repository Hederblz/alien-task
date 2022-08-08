<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(TarefaController::class)->group(function () {
        Route::get('/indice', 'index')->name('tarefas-indice');
        Route::get('/criar', 'create')->name('tarefas-criar');
        Route::get('/editar/{id}', 'edit')->name('tarefas-editar');
        Route::post('/armazenar', 'store')->name('tarefas-armazenar');
        Route::patch('/atualizar/{id}', 'update')->name('tarefas-atualizar');
        Route::delete('/excluir/{id}', 'destroy')->name('tarefas-excluir');
        Route::patch('/trancar/{id}', 'trancar')->name('tarefas-trancar');
        Route::patch('/destrancar/{id}', 'destrancar')->name('tarefas-destrancar');
        Route::patch('/concluir/{id}', 'check')->name('tarefas-concluir');
        Route::patch('/desfazerConclusao/{id}', 'desfazerCoclusao')->name('tarefas-desfazerConclusao');
        Route::get('/timer', function () {
            return view('timer');
        })->name('perfil-timer');
    });
});