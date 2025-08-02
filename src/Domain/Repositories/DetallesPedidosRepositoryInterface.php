<?php

namespace App\Domain\Repositories;

use App\Domain\Models\DetallesPedidos;

interface DetallesPedidosRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?DetallesPedidos;
    public function create(array $data): DetallesPedidos;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}