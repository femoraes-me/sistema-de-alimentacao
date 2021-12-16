<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use App\Models\Escola\Estoque;
use Illuminate\Http\Request;
use App\Models\Secretaria\Escola;
use App\Models\Escola\Alimento;
use App\Models\Escola\Consumo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Secretaria\Entrada;

class DadosEscolaController extends Controller
{
    //
    public function exibeDados($id)
    {
        $escola = Escola::find($id);
        return view('secretaria.dados', compact('escola'));
    }


    public function exibeConsumo(Request $request, $id)
    {

        $data = $request->get('data') ?? Carbon::now()->format('Y-m-d');
        // return $data;
        $escola = Escola::find($id);
        $alimentos = DB::select(DB::raw('
        select  
            a.nome,
            a.unidade,
            sum(c.quantidade_consumida) quantidade_consumida
        from consumos c 
        inner join alimentos a on a.id = c.alimentos_id
        where data = \'' . $data . '\'
        group by a.nome, a.unidade'));

        // return $alimentos;
        return view('secretaria.escolas.consumo', compact('escola', 'alimentos', 'data'));
    }

    public function exibeCardapio(Request $request, $id)
    {
        $data = $request->get('data') ?? Carbon::now()->format('Y-m-d');
        //return $data;
        $escola = Escola::find($id);
        $refeicoes = DB::select(DB::raw('
            SELECT alimentacao, cardapio, quantidade, repeticoes
            FROM cardapios
            WHERE data = \'' . $data . '\'
            and escolas_id = 2
        '));
        //return $refeicoes;
        return view('secretaria.escolas.cardapio', compact('escola', 'refeicoes', 'data'));
    }

    public function consultaCardapio()
    {
    }

    public function exibeRelatorio($id)
    {
        $escola = Escola::find($id);

        $entradas = [];

        $consumos = DB::select(DB::raw('
            select  a.nome,a.unidade,
            sum(c.quantidade_consumida) quantidade_consumida
            from consumos c 
            inner join alimentos a on a.id = c.alimentos_id
            where data BETWEEN "2021-12-12" and "2021-12-15" 
            group by a.nome, a.unidade;
        '));

        $cardapios = [];
        //dd($consumos);
        return view('secretaria.escolas.relatorio', compact('escola', 'consumos'));
    }

    public function exibeEntrada($id)
    {
        $escola = Escola::find($id);
        $alimentos = Alimento::all();
        $estoque = Estoque::where('escola_id', $id)->get();

        return view('secretaria.escolas.entrada', compact('escola', 'alimentos', 'estoque'));
    }

    public function storeEntradeDeAlimentos(Request $request)
    {
        $this->validate(
            $request,
            [
                'data' => 'required|after:' . Carbon::now()->subDays(7) . '|before_or_equal:today',
                'alimento.*.quantidade' => 'required|numeric|gt:0'
            ],
            //messages
            [
                'alimento.*.quantidade.required' => 'campo obrigatório',
                'alimento.*.quantidade.gt' => 'número inválido',
                'alimento.*.quantidade.numeric' => 'não é um número',
                'data.before_or_equal' => 'A data deve ser anterior ou igual ao dia de hoje',
                'data.after' => 'A data deve ser posterior a ' . Carbon::now()->subDays(7)->format('d/m/Y')
            ]
        );

        $requestData = $request->all();

        $requestData['alimento'] = array_filter($requestData['alimento'], function ($alimento) {
            return $alimento['quantidade'] != null;
        });

        foreach ($requestData['alimento'] as $alimento) {
            $estoque = Estoque::where(['escola_id' => $requestData['escola_id']])->where(['alimento_id' => $alimento['id']])->first();
            if ($estoque) {
                $estoque->quantidade += $alimento['quantidade'];
                $estoque->save();
            } else {
                Estoque::create([
                    'escola_id' =>  $requestData['escola_id'],
                    'alimento_id' => $alimento['id'],
                    'quantidade' => $alimento['quantidade']
                ]);
            }
            Entrada::create([
                'escolas_id' =>  $requestData['escola_id'],
                'alimentos_id' => $alimento['id'],
                'quantidade_entrada' => $alimento['quantidade'],
                'data' => $requestData['data']
            ]);
        }

        return redirect()->route('secretaria.escolas.actions.entrada', $requestData['escola_id'])->with('success', 'Alimentos adicionados com sucesso!');
    }
}
