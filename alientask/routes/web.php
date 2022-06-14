<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\MarcadorController;
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

Route::resource('marcador', MarcadorController::class);

Route::delete('/{id}', [RegisteredUserController::class, 'destroy'])->name('userdestroy');
//@TODO: ALTERAR DEPOIS;

Route::put('/{id}', [RegisteredUserController::class, 'update'])->name('userupdate');
//@TODO: ALTERAR DEPOIS;

Route::get('/historico/index', [HistoricoController::class, 'index'])->name('historicoindex');

Route::post('/historico/store', [HistoricoController::class, 'store'])->name('historicostore');

Route::get('/historico/show/{id}', [HistoricoController::class, 'show'])->name('historicoshow');

Route::delete('/historico/{id}', [HistoricoController::class, 'destroy'])->name('historicodestroy');

// Seção de autenticação ->
Route::post('/loginuser', [AuthenticatedSessionController::class, 'store'])->name('loginuser');

require __DIR__ . '/auth.php';
