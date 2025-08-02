<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Facturas;

interface FacturasRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Facturas;
    public function create(array $data): Facturas;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}