<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
use App\Models\Etiqueta;
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
    return view('dashboard');
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
    Route::get('/notasedit/{id}', [NotaController::class, 'edit'])->name('notas-edit');

    Route::post('/notasstore', [NotaController::class, 'store'])->name('notas-store');
    Route::patch('/notasupdate/{id}', [NotaController::class, 'update'])->name('notas-update');
    Route::patch('/notastrancar/{id}', [NotaController::class, 'trancar'])->name('notas-trancar');
    Route::delete('/notasdestroy/{id}', [NotaController::class, 'destroy'])->name('notas-destroy');


    Route::get('/etiquetasindex', [EtiquetaController::class, 'index'])->name('etiquetas-index');
    Route::get('/etiquetascreate', [EtiquetaController::class, 'create'])->name('etiquetas-create');
    Route::get('/etiquetasedit/{id}', [EtiquetaController::class, 'edit'])->name('etiquetas-edit');

    Route::post('/etiquetasstore', [EtiquetaController::class, 'store'])->name('etiquetas-store');
    Route::patch('/etiquetasupdate/{id}', [EtiquetaController::class, 'update'])->name('etiquetas-update');
    Route::delete('/etiquetasdestroy/{id}', [EtiquetaController::class, 'destroy'])->name('etiquetas-destroy');

    Route::get('/profileshow/{id}', [ProfileController::class, 'show'])->name('profile-show');
    Route::get('/profileconfigs/{id}', [ProfileController::class, 'configs'])->name('profile-configs');
    Route::get('/profileupdate/{id}', [ProfileController::class, 'updateData'])->name('profile-updateData');
    Route::get('/profilestatistics/{id}', [ProfileController::class, 'statistics'])->name('profile-statistics');

});

require __DIR__ . '/auth.php';
