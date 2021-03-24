<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaUpdateRequest extends FormRequest
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
            'id' => 'required',
            'nome' => 'required|unique:categorias,nome'
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'Id necessário',
            'nome.required' => 'Nome necessário',
            'nome.unique' => 'Categoria já existe na base'
        ];
    }
}
