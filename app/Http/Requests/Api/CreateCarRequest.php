<?php

namespace App\Http\Requests\Api;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCarRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required'],
            'description' => ['sometimes', 'required', 'string'],
            'price' => ['sometimes', 'required', 'integer'],
            'old_price' => ['sometimes', 'nullable', 'integer', 'gt:price'],
            'car_body_id' => ['sometimes', 'required', 'exists:' . CarBody::class . ',id'],
            'car_class_id' => ['sometimes', 'required', 'exists:' . CarClass::class . ',id'],
            'car_engine_id' => ['sometimes', 'required', 'exists:' . CarEngine::class . ',id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_new' => $this->has('is_new'),
        ]);

        $this->mergeIfMissing([
            'car_class_id' => 1,
            'car_engine_id' => 1,
        ]);
    }
}
