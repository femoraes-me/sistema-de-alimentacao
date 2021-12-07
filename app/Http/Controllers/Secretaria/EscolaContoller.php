<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Secretaria\Escola;
use App\Http\Requests\EscolaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EscolaContoller extends Controller
{
    public function index()
    {
        $escolas = Escola::query()->select('id', 'nome')->where('id', '>', 1);

        return view('secretaria.escolas.index', [
            'escolas' => $escolas->paginate(10)
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

    public function editar()
    {
        $userId = Auth::user()->id;

        $escola = User::find($userId)->escolas()->select('nome', 'qtd_alunos')->get();

        return  view('escola.show-escola', ['escola' => $escola]);
    }


    public function destroy(Escola $escola)
    {
        $escola->delete();

        return redirect()
            ->route('secretaria.escolas.index')
            ->with('success', 'Escola deletada com sucesso');
    }
}
