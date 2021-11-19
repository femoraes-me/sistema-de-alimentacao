<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use App\Models\Escola\Alimento;
use App\Models\Escola\Estoque;
use Illuminate\Http\Request;

class AlimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $estoques = Estoque::with('alimentos')->get();

        return view('escola.estoque', compact('estoques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escola.alimentos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $requestData = $request->all(); // pega todos os dados do formulario  e armazena na variavel requestData
        $alimento = new Alimento(); // cria um novo objeto do tipo alimento

        $alimento->nome = $requestData['alimento']; // armazena o nome do alimento no atributo nome do objeto alimento
        $alimento->unidade = $requestData['unidade']; // armazena a unidade do alimento no atributo unidade do objeto alimento
        $alimento->save(); // salva o objeto alimento no banco de dados

        $estoque = new Estoque();

        $estoque->data = $requestData['data'];
        $estoque->quantidade = $requestData['quantidade'];
        $estoque->alimento_id = $alimento->id;
        $estoque->save();

        return redirect()->route('alimentos'); // redireciona para a pagina de estoque
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
