<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use App\Models\Escola\Estoque;
use Illuminate\Http\Request;
use App\Models\Secretaria\Escola;
use App\Models\Escola\Alimento;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function exibeRelatorio($id)
    {
        $escola = Escola::find($id);
        return view('secretaria.escolas.relatorio', compact('escola'));
    }

    public function exibeEntrada($id)
    {
        $escola = Escola::find($id);

        // $estoque = $escola->estoques()->join('alimentos', 'estoque.alimento_id', '=', 'alimentos.id')
        //     ->select('estoque.alimento_id', 'alimentos.nome', 'alimentos.unidade', 'estoque.quantidade')
        //     ->get();

        // $alimentosId = [];

        // foreach ($estoque as $line) {
        //     $alimentosId[] = $line->alimento_id;
        // }

        // // $alimentosId = 
        // //query para fazer um join entre as tabelas estoque e alimentos
        // $alimentos = Alimento::whereNotIn('alimentos.id', $alimentosId)->get();

        $alimentos = Alimento::all();
        $estoque = Estoque::where('escola_id', $id)->get();
        // $estoque = DB::table('estoque')
        //     ->select('alimento_id', DB::raw('ifnull(sum(quantidade),0)  as quantidade'))
        //     ->rightJoin('alimentos', 'estoque.alimento_id', '=', 'alimentos.id')
        //     ->where('escola_id', $id)
        //     ->groupBy(['alimento_id'])
        //     ->get();

        // dd($estoque);
        return view('secretaria.escolas.entrada', compact('escola', 'alimentos', 'estoque'));
        return view('secretaria.escolas.entrada', compact('estoque', 'escola', 'alimentos'));
    }

    public function storeEntradeDeAlimentos(Request $request)
    {
        $this->validate($request, [
            'data_consumo' => 'required|after:' . Carbon::now()->subDays(7) . '|before_or_equal:today',
        ]);

        $data = $request->all();

        $requestData = $request->all();

        $requestData['alimento'] = array_filter($requestData['alimento'], function ($alimento) {
            return $alimento['quantidade'] != null;
        });

        // dd($requestData);

        foreach ($requestData['alimento'] as $alimento) {
            $estoque = Estoque::where(['alimento_id' => $alimento['id'], ['data', '=', $requestData['data_consumo']]])->first();
            if ($estoque) {
                $estoque->quantidade += $alimento['quantidade'];
                $estoque->save();
            } else {
                Estoque::create([
                    'escola_id' =>  $requestData['escola_id'],
                    'alimento_id' => $alimento['id'],
                    'quantidade' => $alimento['quantidade'],
                    'data' => $requestData['data_consumo'],
                ]);
            }
        }

        return redirect()->route('secretaria.escolas.actions.entrada', $requestData['escola_id'])->with('success', 'Alimentos adicionados com sucesso!');
    }
}
