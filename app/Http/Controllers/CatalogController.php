<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\DTO\CatalogFilterDTO;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function catalog(
        Request $request,
        CatalogDataCollectorServiceContract $catalogDataCollectorService,
        ?string $slug = null,
    ): Factory|View|Application
    {
        $catalogFilterDTO = (new CatalogFilterDTO())
            ->setModel($request->get('model'))
            ->setMinPrice((int) $request->get('min_price'))
            ->setMaxPrice((int) $request->get('max_price'))
            ->setOrderPrice($request->get('order_price'))
            ->setOrderModel($request->get('order_model'));

        $catalogData = $catalogDataCollectorService->collectCatalogData(
            $catalogFilterDTO,
            $slug,
            16,
            $request->get('page', 1),
        );

        return view('pages.cars.catalog', ['catalogData' => $catalogData]);
    }

    public function product(int $id, CarsRepositoryContract $carsRepository): Factory|View|Application
    {
        $car = $carsRepository->findById($id);
        return view('pages.cars.product', ['car' => $car]);
    }
}
