<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => 'required|string',
            'model'         => 'required|string',
            'number_plate'  => 'required|string|unique:cars',
            'description'   => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'         => 'Поле "Название" обязательно для заполнения.',
            'name.string'           => 'Поле "Название" должно быть строкой.',
            'model.required'        => 'Поле "Модель" обязательно для заполнения.',
            'model.string'          => 'Поле "Модель" должно быть строкой.',
            'number_plate.required' => 'Поле "Номерной знак" обязательно для заполнения.',
            'number_plate.string'   => 'Поле "Номерной знак" должно быть строкой.',
            'number_plate.unique'   => 'Автомобиль с таким номерным знаком уже существует.',
            'description.string'    => 'Поле "Описание" должно быть строкой.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Ошибка валидации.',
            'errors'  => $validator->errors()
        ], 422));
    }
}
