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
     * @return array
     */
    public function rules()
    {
        return [
            'client_id' => 'required',
            'auto_number' => 'unique:parkings,auto_number',
            'car_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'car_id.required' => 'Выберите автомобиль',
            'client_id.required' => 'Выберите имя клиента',
            'auto_number.unique' => 'Машина с таким номер уже существует',

        ];
    }
}
