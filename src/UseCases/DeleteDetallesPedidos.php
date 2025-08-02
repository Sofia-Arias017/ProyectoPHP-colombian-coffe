<?php

namespace App\UseCases;

use App\Domain\Repositories\DetallesPedidosRepositoryInterface;

class DeleteDetallesPedidos
{
    public function __construct(private DetallesPedidosRepositoryInterface $repo) {}

    public function execute(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
