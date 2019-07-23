<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date_start' => 'required',
            'date_end' => 'nullable',
            'user' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome deve ser preenchido',
            'description' => 'O campo descrição deve ser preenchido',
            'date_start' => 'O campo data inicial deve ser preenchido',
            'date_end' => 'O campo data final deve ser preenchido',
            'user' => 'Deve ser escolhido um usuario para a tarefa',
        ];
    }
}
