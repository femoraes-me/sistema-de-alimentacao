<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Escola\Alimento;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';

    protected $fillable = [
        'data',
        'quantidade',
        'alimento_id',
    ];

    public function alimentos()
    {
        return $this->belongsTo(Alimento::class, 'alimento_id', 'id');
        // return $this->hasOne(Alimento::class);
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
