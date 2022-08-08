<?php

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

Route::prefix('tarefas')->group(base_path(path: "routes/tarefas.php"));
Route::prefix('notas')->group(base_path(path: "routes/notas.php"));
Route::prefix('etiquetas')->group(base_path(path: "routes/etiquetas.php"));
Route::prefix('perfil')->group(base_path(path: "routes/perfil.php"));
require __DIR__ . '/auth.php';
