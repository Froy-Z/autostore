<?php

namespace App\View\Components\Forms\ConcreteFormsFields;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminCarsFormFields extends Component
{
    public function __construct(
        public readonly Car $car
    ) {
    }
    public function render(): View|Closure|string
    {
        $carClasses = CarClass::get();
        $carBodies = CarBody::get();
        $carEngines = CarEngine::get();

        return view('components.forms.concrete_forms_fields.admin_cars_form_fields', [
            'carBodies' => $carBodies,
            'carClasses' => $carClasses,
            'carEngines' => $carEngines,
        ]);
    }
}
