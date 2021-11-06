<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROTAS DO FELIPE SILVA


// ROTAS DO FELIPE MORAES
