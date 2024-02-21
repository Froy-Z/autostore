<?php

namespace App\Http\Requests;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required|string',
            'price' => ['required', 'integer'],
            'old_price' => ['sometimes', 'nullable', 'integer', 'gt:price'],
            'salon' => '',
            'kpp' => '',
            'year' => '',
            'color' => '',
            'is_new' => 'boolean',
            'car_engine_id' => ['required', 'exists:' . CarEngine::class . ',id'],
            'car_class_id' => ['required', 'exists:' . CarClass::class . ',id'],
            'car_body_id' => ['required', 'exists:' . CarBody::class . ',id'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_new' => $this->has('is_new'),
        ]);
    }

    public function messages()
    {
        return parent::messages();
    }

    public function attributes()
    {
        return parent::attributes();
    }
}
