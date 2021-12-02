<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Secretaria\Escola;
use App\Http\Requests\EscolaRequest;

class EscolaContoller extends Controller
{
    public function index()
    {
        return view('secretaria.escolas.index');
    }

    public function showActions()
    {
        return view('secretaria.menu-acoes-escolas');
    }

    public function store(EscolaRequest $request)
    {
        $requestData = $request->validated();
        /*
        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required',
                'qtd_alunos' => 'required'
            ]
        );*/

        //cria usuário

        Escola::create($requestData);
        return response()->json([
            'status' => 200,
            'message' => 'Escola criada com sucesso'
        ]);
    }
}
