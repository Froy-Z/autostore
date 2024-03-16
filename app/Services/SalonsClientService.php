<?php

namespace App\Services;

use App\Contracts\Services\SalonsClientServiceContract;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    private string $login;
    private string $password;
    private string $url;
    public function __construct(
        private readonly string $baseUrl
    ) {
        $this->login = 'student';
        $this->password = 'password';
        $this->url = '/api/v1/salons';
    }

    public function findAll(): ?array
    {
        return $this->getClient()->get($this->url)->json();
    }

    public function getRandomSalons(int $limit, bool $random): ?array
    {
        return $this->getClient($limit, $random)->get($this->url)->json();

    }

    private function getClient(int $limit = null, bool $random = false): PendingRequest
    {
        $response = Http::baseUrl($this->baseUrl)->withBasicAuth($this->login, $this->password);
        if ($limit != null) {
            $response->withQueryParameters(['limit' => $limit, 'in_random_order' => $random]);
        }
        return $response;
    }
}
