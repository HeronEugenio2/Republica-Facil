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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'       => 'nullable',
            'description' => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'value' => 'required',
            'category_id' => 'required|string|max:255',
            'user_id'     => 'required|string|max:255',
            //                    'image_id'    => $advRequest->input('name'),
            //                    'active'      => $advRequest->input('name'),
        ];
    }
}
