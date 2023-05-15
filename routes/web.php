<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/temp', function () {
//     return view('empresas');
// });

Route::get('emp', [EmpresaController::class, 'index'])->name('index');
Route::post('emp/store', [EmpresaController::class, 'store'])->name('emp.store');
Route::post('emp/delete', [EmpresaController::class, 'delete'])->name('emp.delete');
Route::post('emp/update/{id}', [EmpresaController::class, 'update'])->name('emp.update');
Route::get('emp/edit', [EmpresaController::class, 'edit'])->name('emp.edit');

Route::get('user', [UsuarioController::class, 'index'])->name('user.index');
Route::post('user/store', [UsuarioController::class, 'store'])->name('user.store');
Route::post('user/delete', [UsuarioController::class, 'delete'])->name('user.delete');
Route::post('user/update/{id}', [UsuarioController::class, 'update'])->name('user.update');
Route::get('user/edit', [UsuarioController::class, 'edit'])->name('user.edit');

Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::post('categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::post('categoria/delete', [CategoriaController::class, 'delete'])->name('categoria.delete');
Route::post('categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::get('categoria/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
