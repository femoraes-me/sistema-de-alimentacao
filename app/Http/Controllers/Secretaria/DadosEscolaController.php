<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use App\Models\Escola\Estoque;
use Illuminate\Http\Request;
use App\Models\Secretaria\Escola;
use App\Models\Escola\Alimento;

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

        $estoque = $escola->estoques()->join('alimentos', 'estoque.alimento_id', '=', 'alimentos.id')
            ->select('estoque.alimento_id', 'alimentos.nome','alimentos.unidade', 'estoque.quantidade')
            ->get();

        foreach ($estoque as $line) {
            $alimentosId[] = $line->alimento_id;
        }

        // $alimentosId = 
        //query para fazer um join entre as tabelas estoque e alimentos
        $alimentos = Alimento::select('nome', 'unidade')->whereNotIn('alimentos.id', $alimentosId)->get();

        return view('secretaria.escolas.entrada', compact('estoque', 'escola', 'alimentos'));
    }

    public function storeEntradeDeAlimentos(Request $request){

        $requestData = $request->all();
        return $requestData;
    }
}
