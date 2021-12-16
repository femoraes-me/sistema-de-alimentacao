<?php

namespace App\Models\Escola;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;
    protected $table = 'alimentos';
    protected $fillable = ['nome', 'unidade'];

    public function consumo()
    {
        return $this->hasMany(Consumo::class, 'alimentos_id', 'id');
    }
}
