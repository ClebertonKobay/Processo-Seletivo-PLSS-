<?php

namespace App\Http\Requests;

use http\Message;
use Illuminate\Foundation\Http\FormRequest;

class ChamadosRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'categoria_id' => 'required',
            'descricao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O campo titulo é obrigatório',
            'categoria_id.required' => 'O campo categoria é obrigatório',
            'descricao.required' => 'O campo descriçao é obrigatório',
        ];
    }
}
