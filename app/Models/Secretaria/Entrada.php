<?php

namespace App\Models\Secretaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $fillable = [
        'escolas_id',
        'data',
        'alimentos_id',
        'unidade',
        'quantidade_entrada'
    ];
}
