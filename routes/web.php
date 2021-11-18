<?php

use App\Http\Controllers\Escola\CardapioController;
use App\Http\Controllers\Escola\ConsumoContoller;
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
    return view('welcome');
});

Auth::routes();

Route::get('/estoque', function () {
    return view('estoque');
});

Route::get('/alimentos', function () {
    return view('alimentos');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROTAS DO FELIPE SILVA
//Rotas da pagina de cadastro de Cardapio
Route::get('cardapio', [CardapioController::class, 'create'])->name('cardapio.create');
Route::post('cardapio', [CardapioController::class, 'store'])->name('cardapio.store');
Route::get('consumo', [ConsumoContoller::class, 'create'])->name('consumo.create');

// ROTAS DO FELIPE MORAES
