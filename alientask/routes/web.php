<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\MarcadorController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UserController;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;
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
    $tarefas = Auth::user()->tarefas;
    $notas = Auth::user()->notas;
    return view('dashboard', ['tarefas' => $tarefas, 'notas' => $notas]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function()
{
    Route::get('/tarefasindex', [TarefaController::class, 'index'])->name('tarefas-index');
    Route::get('/tarefasshow/{id}', [TarefaController::class, 'show'])->name('tarefas-show');
    Route::get('/tarefascreate', [TarefaController::class, 'create'])->name('tarefas-create');
    Route::get('/tarefasedit/{id}', [TarefaController::class, 'edit'])->name('tarefas-edit');

    Route::post('/tarefasstore', [TarefaController::class, 'store'])->name('tarefas-store');
    Route::patch('/tarefasupdate/{id}', [TarefaController::class, 'update'])->name('tarefas-update');
    Route::patch('/tarefaschek/{id}', [TarefaController::class, 'check'])->name('tarefas-check');
    Route::patch('/tarefastrancar/{id}', [TarefaController::class, 'trancar'])->name('tarefas-trancar');
    Route::delete('/tarefasdestroy/{id}', [TarefaController::class, 'destroy'])->name('tarefas-destroy');


    Route::get('/notasindex', [NotaController::class, 'index'])->name('notas-index');
    Route::get('/notasshow/{id}', [NotaController::class, 'show'])->name('notas-show');
    Route::get('/notascreate', [NotaController::class, 'create'])->name('notas-create');
    Route::get('/notasedit', [NotaController::class, 'edit'])->name('notas-edit');

    Route::post('/notasstore', [NotaController::class, 'store'])->name('notas-store');
    Route::patch('/notasupdate/{id}', [NotaController::class, 'update'])->name('notas-update');
    Route::patch('/notastrancar/{id}', [NotaController::class, 'trancar'])->name('notas-trancar');
    Route::delete('/notasdelete/{id}', [NotaController::class, 'destroy'])->name('notas-destroy');


    Route::get('/marcadoresindex', [MarcadorController::class, 'index'])->name('marcadores-index');
    
    Route::post('/marcadoresstore', [MarcadorController::class, 'store'])->name('marcadores-store');
    Route::patch('/marcadoresupdate/{id}', [MarcadorController::class, 'update'])->name('marcadores-update');
    Route::delete('/marcadoresdestroy', [MarcadorController::class, 'destroy'])->name('marcadores-destroy');
});

require __DIR__ . '/auth.php';
