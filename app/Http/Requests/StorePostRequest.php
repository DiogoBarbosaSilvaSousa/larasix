<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'category'=> 'required',
            'imagem' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'title.required' => 'O campo título é obrigatório',
          'content.required' => 'O campo conteúdo é obrigatório',
          'category.required' => 'O campo categoria é obrigatório',
          'imagem.required' => 'O campo imagem é obrigatório',
        ];
    }
}
