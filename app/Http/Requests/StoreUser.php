<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //validar tudo que for passado no formulario de cadastrar usuario
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100'
            ],

            'email' => [
                'required',
                'email',
                //regra para validar o email repetido se o usuario estiver editando
                Rule::unique('users', 'email')->ignore($this->id, 'id')
            ],

            'password' => [
                'required',
                'min: 8',
                'max: 100'
            ]
        ];
    }
}
