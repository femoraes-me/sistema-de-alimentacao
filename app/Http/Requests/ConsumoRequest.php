<?php

namespace App\Http\Requests;

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
            'data_consumo' => ['required', 'date'],
            'alimentos.*.quantidade_consumida' => ['required', 'numeric']
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
        return ['alimentos.*.quantidade_consumida.required' => 'Campo obrigatório'];
    }
}
