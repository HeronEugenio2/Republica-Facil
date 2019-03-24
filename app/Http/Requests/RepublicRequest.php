<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TypeRequest
 * @package App\Http\Requests
 * @author  Heron Eugenio
 */
class SlugRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     * @author Heron Eugenio
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     * @author Heron Eugenio
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'member' => 'required|integer|max:255',
            'vacancy' => 'required|integer|max:255',
            'type_id' => 'required|integer|max:255',
            'address_id' => 'required|integer|max:255',
        ];
    }

    /**
     * @return array
     * @author Heron Eugenio
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute tem que ser preenchido',
        ];
    }
}
