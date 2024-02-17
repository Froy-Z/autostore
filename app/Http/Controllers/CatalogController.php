<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;

class CatalogController extends Controller
{

    public function catalog(Request $request): Factory|View|Application
    {
        $cars = Car::query()
            ->when(($model = $request->get('model')) !== null, fn($query) => $query->where('name', 'like', "%$model%"))
            ->when((($minPrice = $request->get('min_price')) !== null), fn($query) => $query->where('price', '>=', $minPrice))
            ->when((($maxPrice = $request->get('max_price')) !== null), fn($query) => $query->where('price', '<=', $maxPrice))
            ->when(($orderPrice = $request->get('order_price')) !== null, fn($query) => $query->orderBy('price', $orderPrice === 'desc' ? 'desc' : 'asc'))
            ->when(($orderModel = $request->get('order_model')) !== null, fn($query) => $query->orderBy('name', $orderModel === 'desc' ? 'desc' : 'asc'))
            ->get();

        return view('pages.cars.catalog', ['cars' => $cars]);
    }

    public function product(int $id): Factory|View|Application
    {
        $car = Car::findOrFail($id);
        return view('pages.cars.product', ['car' => $car]);
    }
}
