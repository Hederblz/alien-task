<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

Route::get('/tarefasindex', [TarefaController::class, 'index'])->name('tarefas-index');
Route::get('/tarefasshow/{id}', [TarefaController::class, 'show'])->name('tarefas-show');
Route::get('/tarefascreate', [TarefaController::class, 'create'])->name('tarefas-create');
Route::get('/tarefasedit/{id}', [TarefaController::class, 'edit'])->name('tarefas-edit');

Route::post('/tarefasstore', [TarefaController::class, 'store'])->name('tarefas-store');
Route::patch('/tarefasupdate/{id}', [TarefaController::class, 'update'])->name('tarefas-update');
Route::patch('/tarefaschek/{id}', [TarefaController::class, 'check'])->name('tarefas-check');
Route::patch('/tarefastrancar/{id}', [TarefaController::class, 'trancar'])->name('tarefas-trancar');
Route::delete('/tarefasdestroy/{id}', [TarefaController::class, 'destroy'])->name('tarefas-destroy');