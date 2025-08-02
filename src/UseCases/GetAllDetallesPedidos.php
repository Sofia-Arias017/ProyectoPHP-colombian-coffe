<?php

namespace App\UseCases;

use App\Domain\Repositories\DetallesPedidosRepositoryInterface;

class GetAllDetallesPedidos{
    public function __construct(private DetallesPedidosRepositoryInterface $repo){}
    
    public function execute(): array{
        return $this->repo->getAll();
    }
}
