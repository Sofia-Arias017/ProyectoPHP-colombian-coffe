<?php

namespace App\UseCases;

use App\Domain\Models\User;
use App\Domain\Repositories\UserRepositoryInterface;
use App\DTOs\UserDTO;

class CreateUsers
{
    public function __construct(private UserRepositoryInterface $repo) {}

    public function execute(UserDTO $dto): User
    {
        return $this->repo->create($dto);
    }
}
