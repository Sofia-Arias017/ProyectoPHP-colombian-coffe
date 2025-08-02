<?php

namespace App\UseCases;

use App\Domain\Repositories\ProductosRepositoryInterface;

class GetAllProductos{
    public function __construct(private ProductosRepositoryInterface $repo){}
    
    public function execute(): array{
        return $this->repo->getAll();
    }
}
