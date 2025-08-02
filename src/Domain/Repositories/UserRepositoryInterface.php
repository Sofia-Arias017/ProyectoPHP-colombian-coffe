<?php

namespace App\Domain\Repositories;

use App\Domain\Models\User;
use App\DTOs\UserDTO;

interface UserRepositoryInterface
{
    public function create(UserDTO $dto): User;
    public function getAll(): array;
    public function getById(int $id): ?User;
    public function update(int $id, UserDTO $dto): bool;
    public function delete(int $id): bool;
}
