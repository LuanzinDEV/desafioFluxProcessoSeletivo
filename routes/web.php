<?php

use App\Http\Controllers\LojaController;
use App\Http\Controllers\ShoppingController;
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

Route::get('/', [ShoppingController::class, 'index'])->name('index');

Route::post('/valida', [ShoppingController::class, 'valida'])->name('valida');

Route::get('/home', [LojaController::class, 'home'])->name('home');

Route::get('/cadastro', [LojaController::class, 'cadastro'])->name('cadastro');

Route::post('/salvar', [LojaController::class, 'create'])->name('salvar');

Route::get('/editar', [ShoppingController::class, 'editDados'])->name('editarDados');

Route::post('/edit', [ShoppingController::class, 'edit'])->name('edit');