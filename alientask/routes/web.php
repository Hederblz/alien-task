<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UserController;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('tarefas', TarefaController::class);

Route::resource('notas', NotaController::class);
//Condensa todos os métodos do controller;

Route::delete('/{id}', [RegisteredUserController::class, 'destroy'])->name('userdestroy');

require __DIR__.'/auth.php';
