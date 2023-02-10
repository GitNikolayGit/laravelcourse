<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
     *
     */
    public function rules()
    {
        return [
            'surname' => 'required',
            'firstName' => 'required',
            'patronymic' => 'required',
            'category' => 'required|numeric',    // разряд
            'experience' => 'required|numeric',  // стаж
        ];
    }
    public function messages()
    {
        return [
            'surname.required' => 'поле фамилия не заполнено',
            'firstName.required' => 'поле имя не заполнено',
            'patronymic.required' => 'поле отчество должно быть заполнено',
            'category.required' => 'поле разряд должно быть заполнено',
            'category.numeric' => 'в поле разряд должно быть число',
            'experience.required' => 'поле стаж должно быть заполнено',
            'experience.numeric' => 'в поле стаж должно быть число',
        ];
    }
}
