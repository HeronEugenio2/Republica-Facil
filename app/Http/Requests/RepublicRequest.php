<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TypeRequest
 * @package App\Http\Requests
 * @author  Heron Eugenio
 */
class RepublicRequest extends FormRequest
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
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'qtdMembers',
        'qtdVacancies',
        'type_id',
        'description',
        'street',
        'district',
        'cep',
        'city',
        'state',
        'number',
    ];

    /**
     * Get the validation rules that apply to the request.
     * @return array
     * @author Heron Eugenio
     */
    public function rules()
    {
        return [
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|max:255',
            'qtdMembers'   => 'required|string|max:255',
            'qtdVacancies' => 'required|string|max:255',
            'type_id'      => 'required|numeric',
            'description'  => 'string|nullable',
            'street'       => 'string|nullable',
            'district'     => 'string|nullable',
            'cep'          => 'string|nullable',
            'city'         => 'string|nullable',
            'state'        => 'string|nullable',
            'number'       => 'numeric|nullable',
        ];
    }

    //    /**
    //     * @return array
    //     * @author Heron Eugenio
    //     */
    //    public function messages()
    //    {
    //        return [
    //            'required' => '- :attribute tem que ser preenchido',
    //        ];
    //    }
}
