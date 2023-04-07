<?php

use App\Http\Controllers\LocadoraController;
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

//locadora routes
Route::get('/locadoras', [LocadoraController::class, 'index'])->name('locadoras.index');
Route::get('/locadoras/criar', [LocadoraController::class, 'create'])->name('locadoras.create');
Route::post('/locadoras', [LocadoraController::class, 'store'])->name('locadoras.store');
Route::get('/locadoras/{locadora}/editar', [LocadoraController::class, 'edit'])->name('locadoras.edit');
Route::put('/locadoras/{locadora}', [LocadoraController::class, 'update'])->name('locadoras.update');
Route::delete('/locadoras/{locadora}', [LocadoraController::class, 'destroy'])->name('locadoras.destroy');
