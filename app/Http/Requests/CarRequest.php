<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CarRequest extends FormRequest
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
            'date' => 'required',           // год выпуска
            'num' => 'required',            // номер
            'surname' => 'required',        // владелец
            'firstName' => 'required',
            'patronymic' => 'required',
        ];
    }
    public function messages(){
        return [
            'date.required' => 'Поле дата должно быть заполнено',           // год выпуска
            'num.required' => 'Поле номер должно быть заполнено',            // номер
            'surname.required' => 'Поле фамилия должно быть заполнено',        // владелец
            'firstName.required' => 'Поле имя должно быть заполнено',
            'patronymic.required' => 'Поле фамилия должно быть заполнено',
            //'brand_id',       // марка авто
            'modelcar_id.required' => 'Поле модель должно быть заполнено',    // модель
            'color_id.required' => 'Поле цвет должно быть заполнено',       // цвет
            'defect_id.required' => 'Поле неисправность должно быть заполнено',
        ];
    }
}
