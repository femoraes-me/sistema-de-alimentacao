<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Escola\{Consumo, Alimento};
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
        $ref = array_keys($requestData['alimentos']);


        foreach ($requestData['alimentos'] as $alimentos) {
            $newRequest = array_merge($data, $alimentos, $userEscola);
            print_r($newRequest);
        }
        return;
        return redirect()->route('escola.consumo.create')->with('success', "Consumo diário cadastrado");
    }
}
