<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Escola\{CardapioController, ConsumoContoller};
use App\Http\Controllers\Escola\AlimentosController;
use App\Http\Controllers\Secretaria\{DadosEscolaController, EscolaContoller};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Secretaria\Auth\RegisterController as User;

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
// ROTA INICIAL
Route::get('/', function () {
    return Auth::user()->role == 'secretaria' ? redirect('alimentos') : redirect('alimentos');
})->middleware('auth');

Auth::routes();

Route::get('alimentos', [AlimentosController::class, 'index'])->name('alimentos');
Route::get('alimentosnovo', [AlimentosController::class, 'create'])->name('alimentos.novo');
Route::post('alimentos/novo', [AlimentosController::class, 'store'])->name('alimentos.cadastrar');
Route::get('alimentos/{id}/editar', [AlimentosController::class, 'edit'])->name('alimentos.editar');
Route::post('alimentos/{id}/salvar', [AlimentosController::class, 'update'])->name('alimentos.salvar');
Route::get('alimentos/{id}/apagar', [AlimentosController::class, 'destroy'])->name('alimentos.apagar');

//DADOS ESCOLA

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//

//Rotas do user tipo secretaria
Route::prefix('secretaria')->name('secretaria.')->middleware('role:secretaria')->group(function () {
    Route::get('/escolas/{id}/acoes', [EscolaContoller::class, 'showActions'])->name('escolas.actions')->middleware('auth');
    Route::get('/escolas/{id}/acoes/consumo', [DadosEscolaController::class, 'exibeConsumo'])->name('escolas.actions.consumo')->middleware('auth');
    Route::get('/escolas/{id}/acoes/cardapio', [DadosEscolaController::class, 'exibeCardapio'])->name('escolas.actions.cardapio')->middleware('auth');
    Route::get('/escolas/{id}/acoes/dados', [DadosEscolaController::class, 'exibeDados'])->name('escolas.actions.dados')->middleware('auth');
    Route::delete('escolas/{escola}', [EscolaContoller::class, 'destroy'])->name('events.destroy')->middleware('auth');
    Route::get('/escolas/{id}/acoes/entrada', [DadosEscolaController::class, 'exibeEntrada'])->name('escolas.actions.entrada')->middleware('auth');
    Route::resource('/escolas', EscolaContoller::class)->middleware('auth');
});

Route::middleware('auth')->group(function () {
    //Rotas do user tipo escola
    Route::prefix('escola')->name('escola.')->middleware('role:escola')->group(function () {
        Route::get('/cardapio', [CardapioController::class, 'create'])->name('cardapio.create');
        Route::post('/cardapio', [CardapioController::class, 'store'])->name('cardapio.store');
        Route::get('/consumo', [ConsumoContoller::class, 'create'])->name('consumo.create');
        Route::post('/consumo', [ConsumoContoller::class, 'store'])->name('consumo.store');
        Route::get('/info', [EscolaContoller::class, 'edit'])->name('info');
        Route::put('/atualizar/{id}', [EscolaContoller::class, 'update'])->name('update');
    });

    //Rotas do user tipo secretaria
    Route::prefix('secretaria')->name('secretaria.')->middleware('role:secretaria')->group(function () {
        Route::get('/escolas/{id}/acoes', [EscolaContoller::class, 'showActions'])->name('escolas.actions')->middleware('auth');
        Route::get('/escolas/{id}/acoes/consumo', [DadosEscolaController::class, 'exibeConsumo'])->name('escolas.actions.consumo')->middleware('auth');
        Route::get('/escolas/{id}/acoes/cardapio', [DadosEscolaController::class, 'exibeCardapio'])->name('escolas.actions.cardapio')->middleware('auth');
        Route::get('/escolas/{id}/acoes/dados', [DadosEscolaController::class, 'exibeDados'])->name('escolas.actions.dados')->middleware('auth');
        Route::delete('escolas/{escola}', [EscolaContoller::class, 'destroy'])->name('events.destroy')->middleware('auth');
        Route::get('/escolas/{id}/acoes/entrada', [DadosEscolaController::class, 'exibeEntrada'])->name('escolas.actions.entrada')->middleware('auth');
        Route::resource('/escolas', EscolaContoller::class)->middleware('auth');
        //Route::get('/usuario', [RegisterController::class, 'index'])->name('usuario/index')->middleware('auth');
        Route::resource('/escolas', EscolaContoller::class)->except(['update', 'edit']);
        Route::resource('/usuarios', User::class);
    });
});
