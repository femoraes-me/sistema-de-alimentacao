<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use App\Models\Escola\Estoque;
use Illuminate\Http\Request;
use App\Models\Secretaria\Escola;

class DadosEscolaController extends Controller
{
    //
    public function exibeDados($id)
    {
        $escola = Escola::find($id);
        return view('secretaria.dados', compact('escola'));
    }


    public function exibeConsumo($id)
    {
        $escola = Escola::find($id);
        return view('secretaria.escolas.consumo', compact('escola'));
    }

    public function exibeCardapio($id)
    {
        $escola = Escola::find($id);
        return view('secretaria.escolas.cardapio', compact('escola'));
    }

    public function exibeEntrada($id)
    {
        $escola = Escola::find($id);
        $estoques = Estoque::with('alimentos')->where('escola_id', $id)->get();
        return view('secretaria.escolas.entrada', compact('estoques', 'escola'));
    }
}
