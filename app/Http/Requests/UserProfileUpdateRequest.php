<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserProfileUpdateRequest
 * @package App\Http\Requests
 */
class UserProfileUpdateRequest extends FormRequest
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
            "file" => 'nullable|max:2048',
            "name" => 'required|string|max:200',
            "email" => 'required|string|email:rfc,dns|max:200',
            "phone" => 'required|string|max:15'
        ];
    }

    public function messages()
    {
        return [
            'file.mimes' => 'Imagem formato incorreto',
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome tem no maximo 200 caracteres',
            'name.string' => 'O campo nome esta formato incorreto',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email esta incorreto',
            'phone.string' => 'O campo telefone e obrigatorio',
        ];
    }
}
