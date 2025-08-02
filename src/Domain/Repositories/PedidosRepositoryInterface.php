<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Pedidos;

interface PedidosRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Pedidos;
    public function create(array $data): Pedidos;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}