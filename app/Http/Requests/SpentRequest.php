<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpentRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required|string|max:255',
            'dateSpent'   => 'nullable|string|max:255',
            //            'value'       => 'required|string|max:255',
            'member'      => 'nullable|string|max:255',
            'republic_id' => 'required|integer|max:255',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Campo com erro description',
            'value.required'       => 'Campo com erro value',
        ];
    }
}
