<?php

namespace App\UseCases;

use App\Domain\Repositories\PedidosRepositoryInterface;

class GetAllPedidos{
    public function __construct(private PedidosRepositoryInterface $repo){}
    
    public function execute(): array{
        return $this->repo->getAll();
    }
}
