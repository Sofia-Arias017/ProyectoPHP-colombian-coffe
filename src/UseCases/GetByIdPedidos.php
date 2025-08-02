<?php

namespace App\UseCases;

use App\Domain\Models\Pedidos;
use App\Domain\Repositories\PedidosRepositoryInterface;

class GetByIdPedidos{

    public function __construct(private PedidosRepositoryInterface $repo){}

    public function execute(int $id): ?Pedidos {
        return $this->repo->getById($id);  
    }
}
