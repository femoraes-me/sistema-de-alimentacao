<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardapioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data' => 'required',
            'cardapio.lanche_manha' =>  'required',
            'cardapio.almoco' => 'required',
            'cardapio.lanche_tarde' => 'required',
            'cardapio.janta' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'cardapio.lanche_manha' => 'lanche da manha',
            'cardapio.almoco' => 'almoço',
            'cardapio.lanche_tarde' => 'lanche da tarde',
            'cardapio.janta' => 'janta'
        ];
    }
}
