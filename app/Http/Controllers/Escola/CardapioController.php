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
<<<<<<< HEAD
        
        $cardapio = $requestData['cardapio'];
    
=======

        $data = ['data' => $requestData['data']];
        $cardapios = $requestData['cardapios'];
>>>>>>> d823f88a227017b9df1e1c7d645464962a1cc0fb

        for ($i = 0; $i < count($cardapios); $i++) {
            $newRequest = array_merge($data, $cardapios[$i]);
            Cardapio::create($newRequest);
        }

        return redirect()->route('escola.cardapio.create')->with('success', "Cardápio cadastrado com sucesso");
    }
}
