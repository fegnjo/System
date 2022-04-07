<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContanctRequest extends FormRequest
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
            'name'=> 'min:3',
            'gender' => 'required',
            'number'=> ['required',Rule::unique('clients')->ignore($this->id)],
            'brand_auto' => 'required|min:1',


        ];
    }

    public function messages()
    {
        return[
            'name.min' => 'В имени должно быть минимум 3 символа ',
            'gender.required' => 'Поле \'Пол\' обязательно для заполнения ',
            'number.required'=> 'Поле \'Номер\' обязательно для заполнения ',
            'number.unique'=> 'Такой номер уже существует ',
            'brand_auto.required' => 'Поле \'Бренд авто\' обязательно для заполнения ',
            'brand_auto.min' => 'Поле \'Бренд авто\' должно иметь минимум 1 символ '


        ];
    }
}
