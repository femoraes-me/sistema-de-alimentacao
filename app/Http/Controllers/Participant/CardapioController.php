<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Partcipant\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function create()
    {
        return view('escola.cardapio');
    }

    public function store(Request $request)
    {

        $requestData = $request->all();
        //return array_keys($requestData['cardapio']);

        $cardapio = $requestData['cardapio'];

        for ($i = 0; $i < count($cardapio); $i++) {
            $alimentacao = array_keys($cardapio);
            $requestData['alimentacao'] = $alimentacao[$i];
            $requestData['cardapio'] = $cardapio[$alimentacao[$i]];

            Cardapio::create($requestData);
        }

        /*
        foreach (array_keys($requestData['cardapio']) as $alimentacao) {
            $requestData['alimentacao'] = $alimentacao;
            
        }
        dd($requestData);*/
    }
}
