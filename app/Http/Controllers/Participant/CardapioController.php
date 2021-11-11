<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function create(){
        return view('escola.cardapio');
    }
}
