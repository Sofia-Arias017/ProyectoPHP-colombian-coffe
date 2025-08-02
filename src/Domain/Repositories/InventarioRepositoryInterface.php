<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Inventario;

interface InventarioRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Inventario;
    public function create(array $data): Inventario;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}