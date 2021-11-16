<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use App\Models\Escola\Cardapio;
use Illuminate\Http\Request;
use App\Http\Requests\CardapioRequest;

class CardapioController extends Controller
{
    public function create()
    {
        return view('escola.cardapio');
    }

    public function store(CardapioRequest $request)
    {

        $requestData = $request->all();
        

        $cardapio = $requestData['cardapio'];

        for ($i = 0; $i < count($cardapio); $i++) {
            $alimentacao = array_keys($cardapio);
            $requestData['alimentacao'] = $alimentacao[$i];
            $requestData['cardapio'] = $cardapio[$alimentacao[$i]];

            Cardapio::create($requestData);
        }

     
    }
}