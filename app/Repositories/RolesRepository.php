<?php

namespace App\Repositories;

use App\Contracts\Repositories\RolesRepositoryContract as RolesRepositoryContractAlias;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class RolesRepository implements RolesRepositoryContractAlias
{
    public function __construct(
        private readonly Role $model
    ) {

    }

    public function hasRole(int $userId, string $role): bool
    {
        return $this->getModel()
            ->whereHas('users', fn (Builder $query) => $query->where('id', $userId))
            ->where('name', $role)
            ->exists();

    }

    private function getModel(): Role
    {
        return $this->model;
    }
}
