<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome'              => 'required|max:20',
            'cep'               => 'required|max:9',
            'endereco'          => 'required|max:200',
            'numero'            => 'required|max:20',
            'complemento'       => 'max:20',
            'bairro'            => 'required|max:200',
            'cidade'            => 'required|max:200',
            'uf'                => 'required|max:2',
        ];
    }


    public function messages()
    {
        return [
            'nome.required'         => 'Preencha o nome!',
            'cep.required'          => 'Preencha o cep!',
            'endereco.required'     => 'Preencha o endereço!',
            'numero.required'       => 'Preencha o número!',
            'bairro.required'       => 'Preencha o bairro!',
            'cidade.required'       => 'Preencha a cidade!',
            'uf.required'           => 'Preencha a UF!',
            '*.max'                 => 'Número de caracteres excedidos!',
            //'endereco.max'          => 'Até 200 caracteres!',
        ];
    }
}
