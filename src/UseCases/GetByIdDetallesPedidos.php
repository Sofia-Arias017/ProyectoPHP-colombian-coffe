<?php

namespace App\UseCases;

use App\Domain\Models\DetallesPedidos;
use App\Domain\Repositories\DetallesPedidosRepositoryInterface;

class GetByIdDetallesPedidos{

    public function __construct(private DetallesPedidosRepositoryInterface $repo){}

    public function execute(int $id): ?DetallesPedidos {
        return $this->repo->getById($id);  
    }
}
