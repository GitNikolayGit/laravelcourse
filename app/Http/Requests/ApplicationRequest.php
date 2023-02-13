<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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

            'surname-owner' => 'required',
            'firstName-owner' => 'required',
            'patronymic-owner' => 'required',
            'date' => 'required',
            'num' => 'required',

            'model' => 'required',
            'color' => 'required',
            'defect' => 'required',
        ];
    }
    public function messages()
    {
        return [
            // клиент
            'surname.required' => 'Поле фамилия должно быть заполнено',
            'firstName.required' => 'Поле имя должно быть заполнено',
            'patronymic.required' => 'Поле отчество должно быть заполнено',
            'passport.required' => 'Поле паспорт должно быть заполнено',
            'birhday.required' => 'Поле дата рождения должно быть заполнено',
            'address.required' => 'Поле адрес должно быть заполнено',
            // машина
            'surname-owner.required' => 'Поле фамилия должно быть заполнено',
            'firstName-owner.required' => 'Поле имя должно быть заполнено',
            'patronymic-owner.required' => 'Поле отчество должно быть заполнено',
            'date.required' => 'Поле год выпуска должно быть заполнено',
            'num.required' => 'Поле номер должно быть заполнено',
            'modelcar.required' => 'Поле модель должно быть заполнено',
            'color.required' => 'Поле цвет должно быть заполнено',
            'defect.required' => 'Поле неисправность должно быть заполнено',
        ];
    }
}
