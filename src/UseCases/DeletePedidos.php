<?php

namespace App\UseCases;

use App\Domain\Repositories\PedidosRepositoryInterface;

class DeletePedidos
{
    public function __construct(private PedidosRepositoryInterface $repo) {}

    public function execute(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
