<?php

namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EscolaContoller extends Controller
{
    public function index()
    {
        return view('secretaria.escolas');
    }
}
