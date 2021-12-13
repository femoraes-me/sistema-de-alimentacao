<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Escola\Alimento;
use App\Models\Secretaria\Escola;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';

    protected $fillable = [
        'data',
        'quantidade',
        'alimento_id',
        'escola_id',
    ];

    public function alimentos()
    {
        return $this->belongsTo(Alimento::class, 'alimento_id', 'id');
    }

    public function escolas()
    {
        return $this->belongsTo(Escola::class, 'escola_id', 'id');
    }

    public function getDataAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }
}
