<?php

namespace App\UseCases;

use App\Domain\Models\Inventario;
use App\Domain\Repositories\InventarioRepositoryInterface;

class GetByIdInventario{

    public function __construct(private InventarioRepositoryInterface $repo){}

    public function execute(int $id): ?Inventario {
        return $this->repo->getById($id);  
    }
}
