<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use App\Models\Escola\Cardapio;
use Illuminate\Http\Request;
use App\Http\Requests\CardapioRequest;
use Illuminate\Http\Resources\MergeValue;

class CardapioController extends Controller
{
    public function create()
    {
        return view('escola.cardapio');
    }

    public function store(CardapioRequest $request)
    {

        $requestData = $request->validated();

        $data = ['data' => $requestData['data']];
        $cardapios = $requestData['cardapios'];

        for ($i = 0; $i < count($cardapios); $i++) {
            $newRequest = array_merge($data, $cardapios[$i]);
            Cardapio::create($newRequest);
        }

        return redirect()->route('escola.cardapio.create')->with('message', "Cardápio cadastrado com sucesso");
    }
}
