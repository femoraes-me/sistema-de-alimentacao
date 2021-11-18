<?php

namespace App\Http\Controllers\Escola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsumoContoller extends Controller
{
    public function create()
    {
        return view('escola.consumo');
    }
}
