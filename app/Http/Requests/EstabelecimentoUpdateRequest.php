<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstabelecimentoUpdateRequest extends FormRequest
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
            'id_estabelecimento' => 'required',
            'razao_social' => 'required|unique:estabelecimentos,razao_social',
            'cnpj' => 'required|unique:estabelecimentos,cnpj|regex:#^\d{2}.?\d{3}.?\d{3}/?\d{4}-?\d{2}#',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }
    public function messages()
    {
        return [
            'razao_social.required' => 'Razão social necessária',
            'razao_social.unique' => 'Razão social já cadastrada',
            'cnpj.required' => 'CNPJ necessário',
            'cnpj.unique' => 'CNPJ já cadastrado',
            'email.email' => 'Email em formato inválido',
            'data_cadastro.date' => 'Data inválida',
            'categoria_id.required' => 'Categoria necessária',
        ];
    }
}
