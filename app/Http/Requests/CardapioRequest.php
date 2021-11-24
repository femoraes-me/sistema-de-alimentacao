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
            //café da manhã
            'cardapios.0.alimentacao' => 'required',
            'cardapios.0.cardapio' => 'required',
            'cardapios.0.quantidade' => 'required',
            'cardapios.0.repeticoes' => 'required',

            //almoço
            'cardapios.1.alimentacao' => '',
            'cardapios.1.cardapio' => 'required',
            'cardapios.1.quantidade' => 'required',
            'cardapios.1.repeticoes' => 'required',

            //café da tarde
            'cardapios.2.alimentacao' => '',
            'cardapios.2.cardapio' => 'required',
            'cardapios.2.quantidade' => 'required',
            'cardapios.2.repeticoes' => 'required',

            //jantar
            'cardapios.3.alimentacao' => '',
            'cardapios.3.cardapio' => 'required',
            'cardapios.3.quantidade' => 'required',
            'cardapios.3.repeticoes' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            //café da manhã
            'cardapios.0.cardapio' => 'café da manhã',
            'cardapios.0.quantidade' => 'quantidade',
            'cardapios.0.repeticoes' => 'repeticoes',

            //almoco
            'cardapios.1.cardapio' => 'almoço',
            'cardapios.1.quantidade' => 'quantidade',
            'cardapios.1.repeticoes' => 'repeticoes',

            //café da tarde
            'cardapios.2.cardapio' => 'café da tarde',
            'cardapios.2.quantidade' => 'quantidade',
            'cardapios.2.repeticoes' => 'repeticoes',

            //jantar
            'cardapios.3.cardapio' => 'jantar',
            'cardapios.3.quantidade' => 'quantidade',
            'cardapios.3.repeticoes' => 'repeticoes',

        ];
    }

    public function messages()
    {
        return [
            'cardapios.0.quantidade.required' => 'Campo obrigatório',
            'cardapios.0.repeticoes.required' => 'Campo obrigatório',
            'cardapios.1.quantidade.required' => 'Campo obrigatório',
            'cardapios.1.repeticoes.required' => 'Campo obrigatório',
            'cardapios.2.quantidade.required' => 'Campo obrigatório',
            'cardapios.2.repeticoes.required' => 'Campo obrigatório',
            'cardapios.3.quantidade.required' => 'Campo obrigatório',
            'cardapios.3.repeticoes.required' => 'Campo obrigatório'
        ];
    }
}
