<?php

namespace App\Models\Secretaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $table = 'escolas';

    protected $fillable = [
        'nome',
        'qtd_alunos'
    ];
}
