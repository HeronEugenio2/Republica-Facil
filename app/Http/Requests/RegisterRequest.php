<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function rules()
    {

        $data = [
            'name'     => $this->request->get('name_register'),
            'email'    => $this->request->get('email_register'),
            'password' => $this->request->get('password_register'),
        ];

        return Validator::make($data, [
            [
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ],
        ]);
    }

    public function messages()
    {
        return [
            'name.required'     => 'O campo nome deve ser preenchido',
            'name.string'       => 'O campo nome deve ser tipo texto',
            'name.max'          => 'O campo nome permite apenas 255 caracteres',
            'email.required'    => 'O campo email deve ser preenchido',
            'email.string'      => 'O campo email deve ser tipo texto',
            'email.max'         => 'O campo email permite apenas 255 caracters',
            'email.unique'      => 'O email já esta sendo utilizado',
            'password.required' => 'O campo senha deve ser preenchido',
        ];
    }
}
