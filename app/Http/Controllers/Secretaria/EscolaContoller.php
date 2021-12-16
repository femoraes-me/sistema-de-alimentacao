<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Secretaria\Escola;
use App\Http\Requests\EscolaRequest;
use App\Models\User;
use Illuminate\Cache\RedisTaggedCache;
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

    public function showActions($id)
    {
        $escola = Escola::find($id);
        return view('secretaria.escolas.menu-acoes-escolas', compact('escola'));
    }

    public function store(EscolaRequest $request)
    {
        $requestData = $request->validated();
        Escola::create($requestData);
        return redirect()->route('secretaria.escolas.index')->with('success', 'Escola criada com sucesso');
    }

    public function edit()
    {
        $userId = Auth::user()->id;

        $escola = User::find($userId)->escolas()->select('id', 'nome', 'qtd_alunos', 'telefone')->get();

        return  view('escola.edit-escola', ['escola' => $escola]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            /*dados a ser validados*/
            $request->all(),
            /*rules*/
            ['qtd_alunos' => ['required', 'numeric', 'integer', 'gt:0'],
            'telefone'=>['required', 'size :14']],
            /*messages*/
            ['telefone.size' => 'Número inválido'],
            /*attributes*/
            ['qtd_alunos' => 'quantidade de alunos']
        );

        if ($validator->fails()) {
            return redirect('escola/info')
                ->withErrors($validator);
        }
        Escola::findOrFail($id)->update($validator->validate());
        return redirect()->route('escola.info')->with('success', 'Os dados da escola foram atualizados');
    }


    public function destroy(Escola $escola)
    {
        $escola->delete();

        return redirect()
            ->route('secretaria.escolas.index')
            ->with('success', 'Escola deletada com sucesso');
    }
}
