<?php

namespace App\Http\Controllers\Secretaria\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Secretaria\Escola;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolas = Escola::query()->select('id', 'nome')->where('id', '>', 1)->get();
        return view(
            'secretaria.users.register',
            ['escolas' => $escolas]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $requestData = $request->all();

        if (array_key_exists('role', $requestData)) {
            $requestData['escola_id'] = 1;
            $requestData['role'] = 'secretaria';
        } else {
            $requestData['role'] = 'escola';
        }
       
        User::create($requestData);
        return redirect()->route('secretaria.usuarios.create')->with('success', 'Usuário criado com sucesso');
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
