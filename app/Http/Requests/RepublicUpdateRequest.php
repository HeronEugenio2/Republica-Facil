<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepublicUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
//            'image' => 'nullable',
            'email' => 'required|max:255',
            'qtdMembers' => 'required|max:255',
            'qtdVacancies' => 'required|max:255',
            'value' => 'required',
            'type_id' => 'required|numeric',
            'description' => 'nullable',
            'photo' => 'nullable',
            'phone' => 'nullable',
            'street' => 'required',
            'district' => 'required',
            'cep' => 'required',
            'city' => 'required',
            'state' => 'required',
            'number' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome permite apenas 255 caracteres',
            'image.image' => 'O campo imagem permite apenas imagens',
            'email.required' => 'O campo email é obrigatório',
            'qtdMembers.required' => 'O campo quantidade de membros é obrigatório',
            'qtdMembers.max' => 'O campo quantidade de membros permite apenas 3 caracteres',
            'qtdVacancies.required' => 'O campo quantidade de vagas é obrigatório',
            'qtdVacancies.max' => 'O campo quantidade de vagas permite apenas 3 caracteres',
            'value.required' => 'O valor do aluguel é obrigatório',
            'type_id.required' => 'O campo tipo é obrigatório',
            'description.string' => 'O campo descrição esta com caracteres invalidos',
            'street.required' => 'O campo rua é obrigatório',
            'district.required' => 'O campo bairro é obrigatório',
            'cep.required' => 'O campo cep é obrigatório',
            'city.required' => 'O campo cidade é obrigatório',
            'state.required' => 'O campo estado é obrigatório',
            'state.string' => 'O campo estado deve ser um texto',
            'number.required' => 'O campo numero é obrigatório',
            'number.numeric' => 'O campo numero permite apenas caracteres do tipo numero',
        ];
    }
}
