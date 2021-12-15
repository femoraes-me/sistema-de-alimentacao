<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EscolaRequest extends FormRequest
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
            'nome' => ['required', 'string', 'unique:escolas,nome'],
            'qtd_alunos' => ['required', 'numeric', 'integer', 'gt:0'],
            'telefone' => ['required', 'size :14']
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'nome da escola',
            'qtd_alunos' => 'quantidade de alunos'
        ];
    }

    public function messages()
    {
        return [
            'telefone.size' => 'Número de telefone inválido',
            'nome.unique' => 'Esta escola já foi criada'
        ];
    }
}
