<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_id'     => 'required|exists:cars,id',
            'user_id'    => 'required|exists:users,id',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time'   => 'required|date_format:Y-m-d H:i:s|after:start_time',
        ];
    }

    public function messages(): array
    {
        return [
            'car_id.required'    => 'Поле "ID автомобиля" обязательно для заполнения.',
            'car_id.exists'      => 'Указанный автомобиль не найден.',
            'user_id.required'   => 'Поле "ID пользователя" обязательно для заполнения.',
            'user_id.exists'     => 'Указанный пользователь не найден.',
            'start_time.required'=> 'Поле "Время начала" обязательно для заполнения.',
            'start_time.date'    => 'Поле "Время начала" должно быть корректной датой.',
            'end_time.required'  => 'Поле "Время окончания" обязательно для заполнения.',
            'end_time.date'      => 'Поле "Время окончания" должно быть корректной датой.',
            'end_time.after'     => 'Поле "Время окончания" должно быть позже времени начала.',
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
