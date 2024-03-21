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
    public function getSalons(?int $limit = null, ?bool $random = null): ?Collection
    {
        $isRandom = is_null($random);
        $cacheTags = $isRandom ? $this->cacheTags() : 'randomSalons';
        $cacheRemember = $isRandom ? 'salons' : sprintf('randomSalons|%d|%s', $limit, implode('|', [$random]));
        $cacheTimeLife = $isRandom ? 3600 : 300;
        return Cache::tags($cacheTags)->remember(
            $cacheRemember,
            $cacheTimeLife,
            function () use ($limit, $random) {
                $salons = collect();
                $data = $this->salonsClientService->getSalons($limit, $random);
                if (is_null($data)) {
                    return $salons;
                }
                foreach ($data as $salon) {
                    $salons->push($this->createModelFromResponseItem($salon));
                }
                return $salons;
            }
        );
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
