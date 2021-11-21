<?php

use App\Http\Controllers\Escola\CardapioController;
use App\Http\Controllers\Escola\ConsumoContoller;
use App\Http\Controllers\Escola\AlimentosController;
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
    return view('escola.alimentos');
})->middleware('auth');

Auth::routes();

Route::get('/estoque', function () {
    return view('estoque');
});

Route::get('alimentos', [AlimentosController::class, 'index'])->name('alimentos');
Route::get('alimentosnovo', [AlimentosController::class, 'create'])->name('alimentos.novo');
Route::post('alimentos/novo', [AlimentosController::class, 'store'])->name('alimentos.cadastrar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROTAS DO FELIPE SILVA
//Rotas da pagina de cadastro de Cardapio
Route::get('cardapio', [CardapioController::class, 'create'])->name('cardapio.create');
Route::post('cardapio', [CardapioController::class, 'store'])->name('cardapio.store');
Route::get('consumo', [ConsumoContoller::class, 'create'])->name('consumo.create');
Route::post('consumo', [ConsumoContoller::class, 'store'])->name('consumo.store');

// ROTAS DO FELIPE MORAES
