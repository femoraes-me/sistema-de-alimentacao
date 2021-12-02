<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DadosEscolaController extends Controller
{
    //
    public function index()
    {
        return view('secretaria.dados-escola');
    }
}
