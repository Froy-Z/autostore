<?php

namespace App\Http\Requests\Api;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;

class UpdateCarRequest extends CreateCarRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return parent::rules();
    }

    protected function prepareForValidation(): void
    {
        parent::prepareForValidation();
    }
}
