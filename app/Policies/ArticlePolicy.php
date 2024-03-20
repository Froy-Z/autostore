<?php

namespace App\Policies;

use App\Contracts\Services\RolesServiceContract;
use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function __construct(
        private readonly RolesServiceContract $rolesService
    ) {

    }
    public function viewAny(User $user): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }

    public function view(User $user, Article $article): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }

    public function create(User $user): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }

    public function update(User $user, Article $article): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }

    public function delete(User $user, Article $article): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }
}
