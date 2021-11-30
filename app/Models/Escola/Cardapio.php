<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;

    protected $table = 'cardapios';

    protected $fillable = [
        'data',
        'alimentacao',
        'cardapio',
        'quantidade',
        'repeticoes'
    ];

    //Mutators


}
