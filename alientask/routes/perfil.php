<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LogController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(RegisteredUserController::class)->group(function () {
        Route::patch('/atualizar', 'updateData')->name('perfil-atualizar');
        Route::patch('/alterarSenha', 'updatePassword')->name('perfil-alterarSenha');
        Route::delete('/excluir/{id}', 'destroy')->name('perfil-excluir');
        Route::get('/status', 'stats')->name('dashboard');
        Route::get('/exibir', 'show')->name('perfil-exibir');
    });
    
    Route::get('/historico', [LogController::class, 'index'])->name('perfil-historico');

});