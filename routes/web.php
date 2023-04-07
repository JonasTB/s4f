<?php

use App\Http\Controllers\LocadoraController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\MontadoraController;
use App\Http\Controllers\VeiculoController;
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

// locadora routes
Route::get('/locadoras', [LocadoraController::class, 'index'])->name('locadoras.index');
Route::get('/locadoras/criar', [LocadoraController::class, 'create'])->name('locadoras.create');
Route::post('/locadoras', [LocadoraController::class, 'store'])->name('locadoras.store');
Route::get('/locadoras/{locadora}/editar', [LocadoraController::class, 'edit'])->name('locadoras.edit');
Route::put('/locadoras/{locadora}', [LocadoraController::class, 'update'])->name('locadoras.update');
Route::delete('/locadoras/{locadora}', [LocadoraController::class, 'destroy'])->name('locadoras.destroy');

// montadora routes
Route::get('/montadora', [MontadoraController::class, 'index'])->name('montadoras.index');
Route::get('/montadoras/criar', [MontadoraController::class, 'create'])->name('montadoras.create');
Route::post('/montadoras', [MontadoraController::class, 'store'])->name('montadoras.store');
Route::get('/montadoras/{montadora}/editar', [MontadoraController::class, 'edit'])->name('montadoras.edit');
Route::put('/montadoras/{montadora}', [MontadoraController::class, 'update'])->name('montadoras.update');
Route::delete('/montadoras/{montadora}', [MontadoraController::class, 'destroy'])->name('montadoras.destroy');

// modelo routes
Route::get('/modelos', [ModeloController::class, 'index'])->name('modelos.index');
Route::get('/modelos/criar', [ModeloController::class, 'create'])->name('modelos.create');
Route::post('/modelos', [ModeloController::class, 'store'])->name('modelos.store');
Route::get('/modelos/{modelo}/editar', [ModeloController::class, 'edit'])->name('modelos.edit');
Route::put('/modelos/{modelo}', [ModeloController::class, 'update'])->name('modelos.update');
Route::delete('/modelos/{modelo}', [ModeloController::class, 'destroy'])->name('modelos.destroy');

// veiculo routes
Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
Route::get('/veiculos/criar', [VeiculoController::class, 'create'])->name('veiculos.create');
Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');
Route::get('/veiculos/{veiculo}/editar', [VeiculoController::class, 'edit'])->name('veiculos.edit');
Route::put('/veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');
