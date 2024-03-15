<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CreateCarServiceContract;
use App\Contracts\Services\DeleteCarServiceContract;
use App\Contracts\Services\UpdateCarServiceContract;
use App\DTO\CatalogFilterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateCarRequest;
use App\Http\Requests\Api\UpdateCarRequest;
use App\Http\Resources\CarResource;
use Illuminate\Http\JsonResponse;

class CarsController extends Controller
{
    public function __construct()
    {
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function index(CarsRepositoryContract $carsRepository)
    {
        return new JsonResponse(CarResource::collection($carsRepository->paginateForCatalog(
            new CatalogFilterDTO(),
            ['id', 'name', 'description', 'price', 'old_price','car_body_id'],
            )), 200, $this->headers
        );
    }

    public function store(
        CreateCarRequest $request,
        CreateCarServiceContract $carService)
    {
        return new CarResource($carService->create($request->validated()));
    }

    public function show(
        int $id,
        CarsRepositoryContract $carsRepository)
    {
        return new JsonResponse(new CarResource($carsRepository->findById($id)),200, $this->headers);
    }

    public function update(
        int $id,
        UpdateCarRequest $request,
        UpdateCarServiceContract $carService)
    {
        return new JsonResponse(new CarResource($carService->update($id, $request->validated())), 200, $this->headers);
    }

    public function destroy(int $id, DeleteCarServiceContract $carService)
    {
        $carService->delete($id);
        return new JsonResponse(
            [
                'success' => true,
                'id' => $id
            ], 200, $this->headers);
    }
}
