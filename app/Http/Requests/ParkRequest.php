<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'поле наименование должно быть заполнено',
            'price.required' => 'поле цена должно быть заполнено',
            'price.numeric' => 'в поле цена должно быть число',
        ];
    }
}
