<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use App\Models\Escola\Alimento;
use App\Models\Escola\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alimentos = DB::select(DB::raw("
        select alimentos.id as id, sum(estoque.quantidade) as quantidade, alimentos.nome as nome, alimentos.unidade as unidade  
        from estoque inner join alimentos on alimentos.id = estoque.alimento_id
        where estoque.escola_id = " . auth()->user()->escolas_id . "
        group by alimentos.id, alimentos.nome, alimentos.unidade"));

        return view('escola.estoque', compact('alimentos'));
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
        //dd($request->all());

        $requestData = $request->all(); // pega todos os dados do formulario  e armazena na variavel requestData
        $alimento = new Alimento(); // cria um novo objeto do tipo alimento

        $alimento->nome = $requestData['alimento']; // armazena o nome do alimento no atributo nome do objeto alimento
        $alimento->unidade = $requestData['unidade']; // armazena a unidade do alimento no atributo unidade do objeto alimento
        $alimento->save(); // salva o objeto alimento no banco de dados

        return redirect()->route('secretaria.alimentos'); // redireciona para a pagina de estoque
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
        $alimento = Alimento::findOrFail($id);

        // dd($estoque);

        return view('escola.alimentos-editar', compact('alimento'));
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
        //dd($request->all());
        $alimento = Alimento::findOrFail($id);
        $requestData = $request->all();

        $alimento->nome = $requestData['alimento'];
        $alimento->unidade = $requestData['unidade'];
        $alimento->save();

        return redirect()->route('secretaria.alimentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alimento = Alimento::findOrFail($id);
        $alimento->delete();
        return redirect()->route('secretaria.alimentos');
    }


    function secretaria()
    {
        $alimentos = Alimento::all();
        return view('secretaria.alimentos', compact('alimentos'));
    }
}
