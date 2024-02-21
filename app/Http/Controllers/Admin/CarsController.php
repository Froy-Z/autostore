<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Article;
use App\Models\Car;
use App\Services\FlashMessage;
use App\Services\SlugService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Показать список автомобилей
     */
    public function index()
    {
        $cars = Car::oldest('id')->get();
        return view('pages.admin.cars.index', ['cars' => $cars]);
    }

    /**
     * Показать форму создания автомобиля
     */
    public function create()
    {
        return view('pages.admin.cars.create', ['car' => new Car()]);
    }

    /**
     * Добавление автомобиля в БД на основе POST запроса
     */
    public function store(CarRequest $request)
    {
        try {
            Car::create($request->validated());
        } catch (\Exception $e) {
            $flashMessage = new FlashMessage();
            $flashMessage->error($e->getMessage());
            return redirect()->route('admin.cars.create');
        }
        $flashMessage = new FlashMessage();
        $flashMessage->success('Модель успешно обновлена');
        return redirect()->route('admin.cars.index');
    }

    /**
     * Показать форму для редактирования автомобиля
     */
    public function edit(Car $car)
    {

        return view('pages.admin.cars.edit', ['car' => $car] );
    }

    /**
     * Обновить и сохранить параметры автомобиля
     */
    public function update(CarRequest $request, Car $car)
    {
        try {
            $car->update($request->validated());
        } catch (\Exception $e) {
            $flashMessage = new FlashMessage();
            $flashMessage->error($e->getMessage());
            return redirect()->route('admin.cars.edit', ['car' => $car]);
        }
        $flashMessage = new FlashMessage();
        $flashMessage->success('Модель успешно обновлена');
        return redirect()->route('admin.cars.index');
    }

    /**
     * Удалить автомобиль из БД
     */
    public function destroy(Car $car): RedirectResponse
    {
        try {
            $car->delete();
        } catch (\Exception $e) {
            $flashMessage = new FlashMessage();
            $flashMessage->error('При удалении модели произошла ошибка');
            return redirect()->route('admin.cars.index');
        }
        $flashMessage = new FlashMessage();
        $flashMessage->success('Модель успешно удалена');
        return redirect()->route('admin.cars.index');

    }
}
