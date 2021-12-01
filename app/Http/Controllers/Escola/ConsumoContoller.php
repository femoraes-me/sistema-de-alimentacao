<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Escola\{Consumo, Alimento};
use App\Http\Requests\ConsumoRequest;

class ConsumoContoller extends Controller
{
    public function create()
    {
        $alimentos = Alimento::all();
        return view('escola.consumo', compact('alimentos'));
    }

    public function store(ConsumoRequest $request)
    {
        $requestData = $request->all();
        $data = ['data' =>$requestData['data_consumo']];
        $ref = array_keys($requestData);
        
        
        for ($i = 2; $i < count($ref); $i++) {
            $newRequest = array_merge($data, $requestData[$ref[$i]]);
            Consumo::create($newRequest);
        }

        return redirect()->route('escola.consumo.create')->with('success', "Consumo diário cadastrado");
    }

    
}
