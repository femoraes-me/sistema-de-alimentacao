<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
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
            'data' => ['required','before_or_equal:today', 'after:' . Carbon::now()->subDays(7)],
            //café da manhã
            'cardapios.*.alimentacao' => 'required',
            'cardapios.*.cardapio' => 'required',
            'cardapios.*.quantidade' => ['required','numeric','integer', 'gte:0'],
            'cardapios.*.repeticoes' => 'required'

        ];
    }

    public function attributes()
    {
        return [
            //café da manhã
            'cardapios.0.cardapio' => 'café da manhã',
            'cardapios.*.quantidade' => 'quantidade',
            'cardapios.*.repeticoes' => 'repeticoes',

            //almoco
            'cardapios.1.cardapio' => 'almoço',
            

            //café da tarde
            'cardapios.2.cardapio' => 'café da tarde',
           
            //jantar
            'cardapios.3.cardapio' => 'jantar'
            

        ];
    }

    public function messages()
    {
        return [
            'cardapios.*.quantidade.required' => 'Campo obrigatório',
            'cardapios.*.repeticoes.required' => 'Campo obrigatório',
            'cardapios.*.quantidade.numeric' => 'não é um número',
            'cardapios.*.quantidade.integer' => 'número inválido',
            'cardapios.*.quantidade.gte' => 'número inválido',
            'data.before_or_equal' => 'A data deve ser anterior ou igual ao dia de hoje',
            'data.after' => 'A data deve ser posterior a ' . Carbon::now()->subDays(7)->format('d/m/Y')
        ];
    }
}
