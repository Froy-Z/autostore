<?php

namespace App\Repositories;

use App\Contracts\Repositories\SalonsRepositoryContract;
use App\Contracts\Services\SalonsClientServiceContract;
use App\DTO\ApiSalonModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SalonsRepository implements SalonsRepositoryContract
{
    use FlushCache;
    public function __construct(
        private readonly SalonsClientServiceContract $salonsClientService
    ) {
    }
    protected function cacheTags(): array
    {
        return ['salons'];
    }

    public function findAll(): ?Collection
    {
        return Cache::tags($this->cacheTags())->remember(
            'salons',
            3600,
            function () {
                $salons = collect();
                $data = $this->salonsClientService->findAll();
                if (is_null($data)) {
                    return collect();
                }
                foreach ($data as $salon) {
                    $salons->push($this->createModelFromResponseItem($salon));
                }
                return $salons;
            });
    }

    public function getRandomSalons(int $limit, bool $random): ?Collection
    {
        return Cache::tags('randomSalons')->remember(
            sprintf('randomSalons|%d|%s', $limit, implode('|', [$random])),
            300,
            function () use ($limit, $random) {
                $salons = collect();
                $data = $this->salonsClientService->getRandomSalons($limit, $random);
                if (is_null($data)) {
                    return collect();
                }
                foreach ($data as $salon) {
                    $salons->push($this->createModelFromResponseItem($salon));
                }
                return $salons;
            });
    }

    private function createModelFromResponseItem($salon): ApiSalonModel
    {
        return new ApiSalonModel(
            $salon['name'],
            $salon['image'],
            $salon['address'],
            $salon['phone'],
            $salon['work_hours'],
        );
    }
}
