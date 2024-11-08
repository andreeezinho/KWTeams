<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

                  //extende da classe StoreUser (criar usuario)
class EditUser extends StoreUser
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
        //definir que pode-se criar regras personalizadas
        $rules = parent::rules();

        return [
            $rules['password'] = [
                'nullable',
                'min: 8',
                'max: 255'
            ]
        ];
    }
}
