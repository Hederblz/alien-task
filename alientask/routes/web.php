<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    $user = Auth::user();
    return view('dashboard', ['user' => $user]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function()
{
    Route::prefix('tarefas')->group(base_path(path: 'routes/tarefas.php'));
    Route::prefix('notas')->group(base_path(path: 'routes/notas.php'));
    Route::prefix('etiquetas')->group(base_path(path: 'routes/etiquetas.php'));
    Route::prefix('perfil')->group(base_path(path: 'routes/perfil.php'));

    Route::get('/timer', function() {
        return view('timer');
    })->name('timer');

    Route::get('/historico', [LogController::class, 'index'])
    ->name('historico-index');
    Route::get('/perfilindex', function() {return view('user.index');})->name('perfil');
});

require __DIR__ . '/auth.php';
