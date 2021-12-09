<?php

namespace App\Models\Secretaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Escola\Estoque;

class Escola extends Model
{
    use HasFactory;

    protected $table = 'escolas';

    protected $fillable = [
        'nome',
        'qtd_alunos'
    ];

    //relationships

    public function users(){
        return $this->hasMany(User::class);
    }

    public function estoques(){
        return $this->hasMany(Estoque::class);
    }

    //mutators
    public function setNomeAttribute($value){
        $this->attributes['nome'] = strtoupper($value);
    }
}
