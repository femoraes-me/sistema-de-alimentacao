<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Escola\Consumo;
use App\Http\Requests\ConsumoRequest;

class ConsumoContoller extends Controller
{
    public function create()
    {
        return view('escola.consumo');
    }

    public function store(ConsumoRequest $request)
    {
        $requestData = $request;
        
        Consumo::create($requestData);
    }
}
