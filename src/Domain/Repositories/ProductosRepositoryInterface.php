<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Productos;

interface ProductosRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Productos;
    public function create(array $data): Productos;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}