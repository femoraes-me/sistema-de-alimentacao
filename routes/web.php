<?php

use App\Http\Controllers\Escola\CardapioController;
use App\Http\Controllers\Escola\ConsumoContoller;
use App\Http\Controllers\Escola\AlimentosController;
use App\Http\Controllers\Secretaria\EscolaContoller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// ROTAS DA ANNA
Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();
Route::get('/estoque', [AlimentosController::class, 'index'])->name('estoque');


Route::get('alimentos', [AlimentosController::class, 'index'])->name('alimentos');
Route::get('alimentosnovo', [AlimentosController::class, 'create'])->name('alimentos.novo');
Route::post('alimentos/novo', [AlimentosController::class, 'store'])->name('alimentos.cadastrar');
Route::get('alimentos/{id}/editar', [AlimentosController::class, 'edit'])->name('alimentos.editar');
Route::post('alimentos/{id}/salvar', [AlimentosController::class, 'update'])->name('alimentos.salvar');
Route::get('alimentos/{id}/apagar', [AlimentosController::class, 'destroy'])->name('alimentos.apagar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROTAS DO FELIPE SILVA
//Rotas do user tipo escola
Route::prefix('escola')->name('escola.')->middleware('role:escola')->group(function () {
    Route::get('/cardapio', [CardapioController::class, 'create'])->name('cardapio.create')->middleware('auth');
    Route::post('/cardapio', [CardapioController::class, 'store'])->name('cardapio.store')->middleware('auth');
    Route::get('/consumo', [ConsumoContoller::class, 'create'])->name('consumo.create')->middleware('auth');
    Route::post('/consumo', [ConsumoContoller::class, 'store'])->name('consumo.store')->middleware('auth');
});

//Rotas do user tipo secretaria
Route::prefix('secretaria')->name('secretaria.')->middleware('role:secretaria')->group(function () {
    Route::get('/escolas', [EscolaContoller::class, 'index'])->name('escolas.index')->middleware('auth');
});
// ROTAS DO FELIPE MORAES
