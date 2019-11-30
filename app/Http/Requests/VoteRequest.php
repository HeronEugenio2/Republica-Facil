<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteRequest extends FormRequest
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
//            'cpf' => 'required',
            'optionVote' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'Por favor informe seu CPF',
            'optionVote.required' => 'Para que seu voto seja adicionado você precisa escolher entre "Sim" ou "Não" na hora de votar.',
        ];
    }
}
