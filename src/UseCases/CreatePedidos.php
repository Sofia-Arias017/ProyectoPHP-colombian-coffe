<?php

namespace App\UseCases;

use App\Domain\Models\Pedidos;
use App\Domain\Repositories\PedidosRepositoryInterface;

class CreatePedidos
{
    public function __construct(private PedidosRepositoryInterface $repo) {}

    public function execute(array $data): ?Pedidos
    {
        return $this->repo->create($data); 
    }
}
