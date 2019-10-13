<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
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

    /**as12312312
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'nullable',
            'description' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'value' => 'required',
            'category_id' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
            'cep' => 'required',
            'address' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            "Câmeras" => "nullable",
            "Mobiliado" => "nullable",
            "Próximo_ao_ônibus" => "nullable",
            "Quarto_individual" => "nullable",
            "Televisão" => "nullable",
            "Wi-fi_/_Internet" => "nullable",
            "Lavanderia" => "nullable",
            "Próximo_ao_Metrô" => "nullable",
            "Quarto_Compartilhado" => "nullable",
            "Quintal" => "nullable",
            "Todas_as_contas_inclusas" => "nullable",
            "Ventilador" => "nullable",
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'O campo descrição é obrigatório',
            'title.required' => 'O campo titulo é obrigatório',
            'value.required' => 'O campo valor é obrigatório',
            'category_id.required' => 'O campo categoria é obrigatório',
            'cep.required' => 'O campo cep é obrigatório',
            'address.required' => 'O campo bairro é obrigatório',
            'street.required' => 'O campo endereço é obrigatório',
            'city.required' => 'O campo cidade é obrigatório',
            'state.required' => 'O campo estado é obrigatório',
        ];
    }
}
