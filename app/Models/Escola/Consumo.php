<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    use HasFactory;

    protected $table = 'consumos';

    protected $fillable = [
        'escolas_id',
        'data',
        'alimentos_id',
        'unidade',
        'quantidade_consumida'
    ];

    public function alimento()
    {
        return $this->belongsTo(Alimento::class, 'alimentos_id', 'id');
    }
}
