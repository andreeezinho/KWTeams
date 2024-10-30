<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTarefa extends FormRequest
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
            //especificando as validações do request
            'nome' => [
                'required',
                'string',
                'min: 3'
            ],

            'descricao' => [
                'string'
            ],

            'status' => [
                'required'
            ]
        ];
    }
}
