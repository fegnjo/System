<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AutoRequest extends FormRequest
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
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'gos_number' => ['required', Rule::unique('cars')->ignore($this->id)],
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'brand.required' => 'Поле \'Бренд\' обязательно для заполнения',
            'model.required' => 'Поле \'Модель\' обязательно для заполнения',
            'color.required' => 'Поле \'Цвет\' обязательно для заполнения',
            'gos_number.required' => 'Поле \'Гос.номер\' обязательно для заполнения',
            'gos_number.unique' => 'Такой номер уже существует',
            'status.required' => 'Поле \'Статус\' обязательно для заполнения'
        ];
    }
}
