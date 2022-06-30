<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/profileshow/{id}', [ProfileController::class, 'show'])->name('perfil-show');
Route::get('/profileconfigs/{id}', [ProfileController::class, 'configs'])->name('perfil-configs');
Route::get('/profileupdate/{id}', [ProfileController::class, 'updateData'])->name('perfil-updateData');
Route::get('/profilestatistics/{id}', [ProfileController::class, 'statistics'])->name('perfil-statistics');
Route::delete('/perfildestroy/{id}', [RegisteredUserController::class, 'destroy'])->name('perfil-destroy');