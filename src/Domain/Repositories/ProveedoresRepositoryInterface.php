<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Proveedores;

interface ProveedoresRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Proveedores;
    public function create(array $data): Proveedores;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}