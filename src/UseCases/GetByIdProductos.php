<?php

namespace App\UseCases;

use App\Domain\Models\Productos;
use App\Domain\Repositories\ProductosRepositoryInterface;

class GetByIdProductos{

    public function __construct(private ProductosRepositoryInterface $repo){}

    public function execute(int $id): ?Productos {
        return $this->repo->getById($id);  
    }
}
