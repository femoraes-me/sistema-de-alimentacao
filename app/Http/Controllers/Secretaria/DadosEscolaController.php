<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DadosEscolaController extends Controller
{
    //
    public function exibeDados()
    {
        return view('secretaria.dados');
    }

    public function exibeConsumo()
    {
        return view('secretaria.escolas.consumo');
    }

    public function exibeCardapio()
    {
        return view('secretaria.escolas.cardapio');
    }
}
