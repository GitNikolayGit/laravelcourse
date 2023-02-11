<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'surname' => 'required',
            'firstName' => 'required',
            'patronymic' => 'required',
            'passport' => 'required',
            'birhday' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'surname.required' => 'Поле фамилия должно быть заполнено',
            'firstName.required' => 'Поле имя должно быть заполнено',
            'patronymic.required' => 'Поле отчество должно быть заполнено',
            'passport.required' => 'Поле паспорт должно быть заполнено',
            'birhday.required' => 'Поле дата рождения должно быть заполнено',
            'address.required' => 'Поле адрес должно быть заполнено',
        ];
    }
}
