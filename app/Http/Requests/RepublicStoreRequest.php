<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepublicStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string',
            'qtdMembers' => 'nullable|string',
            'qtdVacancies' => 'nullable|string',
            'value' => 'required|string',
            'type_id' => 'required|string',
            'description' => 'required|string',
            'street' => 'required|string',
            'district' => 'required|string',
            'cep' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'number' => 'required|string',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'O campo Nome deve ser preenchido',
            'email.required' => 'O campo Email deve ser preenchido',
            'value.required' => 'O campo valor do aluguel deve ser preenchido',
            'type_id' => 'O tipo de republica deve ser selecionado',
            'description.required' => 'O campo descrição deve ser preenchido',
            'street.required' => 'O campo Rua deve ser preenchido',
            'district.required' => 'O campo Bairro deve ser preenchido',
            'cep.required' => 'O campo CEP deve ser preenchido corretamente',
            'city.required' => 'O campo cidade deve ser preenchido corretamente',
            'state.required' => 'O campo Estado deve ser preenchido corretamente',
            'number.required' => 'O campo Numero deve ser preenchido corretamente'
        ];
    }
}
