<?php

namespace App\UseCases;

use App\Domain\Repositories\ProductosRepositoryInterface;

class DeleteProductos
{
    public function __construct(private ProductosRepositoryInterface $repo) {}

    public function execute(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
