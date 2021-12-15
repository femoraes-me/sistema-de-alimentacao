<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ConsumoRequest extends FormRequest
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
            'data_consumo' => ['required', 'date', 'before_or_equal:today', 'after:' . Carbon::now()->subDays(7)],
            'alimentos.*.quantidade_consumida' => ['required', 'numeric', 'gt:0']
        ];
    }

    public function attributes()
    {
        return [
            'data_consumo' => 'data'
        ];
    }

    public function messages()
    {
        return [
            'alimentos.*.quantidade_consumida.required' => 'campo obrigatório',
            'alimentos.*.quantidade_consumida.gt' => 'número inválido',
            'alimentos.*.quantidade_consumida.numeric' => 'não é um número',
            'data_consumo.before_or_equal' => 'A data deve ser anterior ou igual ao dia de hoje',
            'data_consumo.after' => 'A data deve ser posterior a ' . Carbon::now()->subDays(7)->format('d/m/Y')
        ];
    }
}
