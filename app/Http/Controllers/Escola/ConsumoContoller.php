<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Escola\{Consumo, Alimento, Estoque};
use App\Http\Requests\ConsumoRequest;
use Illuminate\Support\Facades\Auth;

class ConsumoContoller extends Controller
{
    public function create()
    {
        $alimentos = Alimento::all();
        return view('escola.consumo', compact('alimentos'));
    }

    public function store(ConsumoRequest $request)
    {

        $requestData = $request->validated();

        $userEscola = ['escolas_id' => Auth::user()->escolas_id];
        $data = ['data' => $requestData['data_consumo']];


        foreach ($requestData['alimentos'] as $alimento) {
            $data = array_merge($data, $alimento, $userEscola);
            $estoque = Estoque::where(['escola_id' => $requestData['escola_id']])->where(['alimento_id' => $alimento['id']])->first();

            $estoque->quantidade -= $alimento['quantidade'];
            $estoque->save();
            Consumo::create([
                'escolas_id' =>  $data['escola_id'],
                'alimentos_id' => $alimento['id'],
                'quantidade_entrada' => $alimento['quantidade'],
                'data' => $data['data']
            ]);
        }
        return redirect()->route('escola.consumo.create')->with('success', "Consumo diário cadastrado");
    }
}
