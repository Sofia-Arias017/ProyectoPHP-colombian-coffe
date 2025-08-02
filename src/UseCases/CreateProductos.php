<?php

namespace App\UseCases;

use App\Domain\Models\Productos;
use App\Domain\Repositories\ProductosRepositoryInterface;

class CreateProductos
{
    public function __construct(private ProductosRepositoryInterface $repo) {}

    public function execute(array $data): ?Productos
    {
        return $this->repo->create($data); 
    }
}
