<?php

namespace App\View\Components\Forms\ConcreteFormsFields;

use App\Contracts\Repositories\CarBodiesRepositoryContract;
use App\Contracts\Repositories\CarClassesRepositoryContract;
use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Models\Car;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminCarsFormFields extends Component
{
    public function __construct(
        public readonly Car $car,
        private readonly CarBodiesRepositoryContract $carBodiesRepository,
        private readonly CarClassesRepositoryContract $carClassesRepository,
        private readonly CarEnginesRepositoryContract $carEnginesRepository,
    ) {
    }
    public function render(): View|Closure|string
    {
        $carBodies = $this->carBodiesRepository->findAll();
        $carClasses = $this->carClassesRepository->findAll();
        $carEngines = $this->carEnginesRepository->findAll();

        return view('components.forms.concrete_forms_fields.admin_cars_form_fields', [
            'carBodies' => $carBodies,
            'carClasses' => $carClasses,
            'carEngines' => $carEngines,
        ]);
    }
}
