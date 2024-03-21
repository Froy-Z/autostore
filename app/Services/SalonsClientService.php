<?php

namespace App\Services;

use App\Contracts\Services\SalonsClientServiceContract;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    public function __construct(
        private readonly string $baseUrl,
        private readonly string $username,
        private readonly string $password,
    ) {
    }

    public function getSalons(?int $limit, ?bool $random): ?array
    {
        return $this->getClient($limit, $random)->get('/api/v1/salons')->json();
    }

    private function getClient(?int $limit, ?bool $random): PendingRequest
    {
        $response = Http::baseUrl($this->baseUrl)->withBasicAuth($this->username, $this->password);
        if ($limit != null) {
            $response->withQueryParameters(['limit' => $limit, 'in_random_order' => $random]);
        }
        return $response;
    }
}
