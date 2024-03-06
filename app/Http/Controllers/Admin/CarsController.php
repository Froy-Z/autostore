<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;

class CarsController extends Controller
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly FlashMessageContract $flashMessage
    ) {
    }

    public function index()
    {
        $cars = $this->carsRepository->findAll();
        return view('pages.admin.cars.index', ['cars' => $cars]);
    }

    /**
     * Показать форму создания автомобиля
     */
    public function create()
    {
        $car = $this->carsRepository->getModel();
        return view('pages.admin.cars.create', ['car' => $car]);
    }

    /**
     * Добавление автомобиля в БД на основе POST запроса
     */
    public function store(CarRequest $request)
    {
        try {
            $this->carsRepository->create($request->validated());
        } catch (\Exception $e) {
            $this->flashMessage->error('При создании модели произошла ошибка');
            return redirect()->route('admin.cars.create');
        }
        $this->flashMessage->success('Модель успешно создана');
        return redirect()->route('admin.cars.index');
    }

    /**
     * Показать форму для редактирования автомобиля
     */
    public function edit(int $id)
    {
        $car = $this->carsRepository->findById($id);
        return view('pages.admin.cars.edit', ['car' => $car]);
    }

    /**
     * Обновить и сохранить параметры автомобиля
     */
    public function update(CarRequest $request, Car $car)
    {
        try {
            $this->carsRepository->update($car->id, $request->validated());
        } catch (\Exception $e) {
            $this->flashMessage->error('При обновлении модели произошла ошибка');
            return redirect()->route('admin.cars.edit', ['car' => $car]);
        }
        $this->flashMessage->success('Модель успешно обновлена');
        return redirect()->route('admin.cars.index');
    }

    /**
     * Удалить автомобиль из БД
     */
    public function destroy(Car $car): RedirectResponse
    {
        try {
            $this->carsRepository->delete($car->id);
        } catch (\Exception $e) {
            $this->flashMessage->error('При удалении модели произошла ошибка');
            return redirect()->route('admin.cars.index');
        }
        $this->flashMessage->success('Модель успешно удалена');
        return redirect()->route('admin.cars.index');
    }
}
