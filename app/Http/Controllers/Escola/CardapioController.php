<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use App\Models\Escola\Cardapio;
use Illuminate\Http\Request;
use App\Http\Requests\CardapioRequest;
use Illuminate\Http\Resources\MergeValue;
Use Illuminate\Support\Facades\Auth;
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
        $userEscola = ['escola_id' => Auth::user()->escolas_id];
        $cardapios = $requestData['cardapios'];

        foreach ($requestData['cardapios'] as $cardapios) {
            
            $newRequest = array_merge($data, $cardapios, $userEscola);
            Cardapio::create($newRequest);
        }

        return redirect()->route('escola.cardapio.create')->with('success', "Cardápio cadastrado com sucesso");
    }
}
