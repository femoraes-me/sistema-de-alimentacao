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
        $escolas = Escola::paginate(10);
        return view('secretaria.escolas.index', [
            'escolas' => $escolas
        ]);
    }

    public function showActions()
    {
        return view('secretaria.escolas.menu-acoes-escolas');
    }

    public function store(EscolaRequest $request)
    {
        $requestData = $request->validated();
        //cria usuário
        Escola::create($requestData);
        return response()->json([
            'status' => 200,
            'message' => 'Escola criada com sucesso'
        ]);
    }

    


    public function destroy(Escola $escola)
    {
        $escola->delete();

        return redirect()
            ->route('secretaria.escolas.index')
            ->with('success', 'Escola deletada com sucesso');
    }
}
