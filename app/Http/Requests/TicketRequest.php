<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
        $rules = [
            'name'                  => ['bail','required', 'string', 'max:150'],
            'category_id'           => ['bail','required', 'exists:categories,id'],
            'city_id'               => ['bail','required', 'exists:cities,id'],
            'age'                   => ['bail','required', 'regex:/^(بالغين|أطفال)$/'],
            'price_without_vat'     => ['bail','regex:/^(?:[1-9]\d+|\d)(?:\,\d\d)?$/'],
            'date_party'            => ['bail','date', 'required'],
            'hour_party'            => ['bail','required'],
            'image'                 => ['bail','image', 'max:1024'],
            'image2'                => ['bail','nullable', 'image', 'max:1024'],
            'image3'                => ['bail','nullable', 'image', 'max:1024'],
            'image4'                => ['bail','nullable', 'image', 'max:1024'],
            'qty'                   => ['bail','required', 'gt:0'],
            'desc'                  => ['bail','nullable'],
            'information'           => ['bail','nullable'],
        ];

        if ($this->getMethod() == 'POST') {
            array_push($rules['image'], 'required');
        }

        return $rules;

    }

}
