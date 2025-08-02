<?php

namespace App\UseCases;

use App\Domain\Models\Proveedores;
use App\Domain\Repositories\ProveedoresRepositoryInterface;

class GetByIdProveedores{

    public function __construct(private ProveedoresRepositoryInterface $repo){}

    public function execute(int $id): ?Proveedores {
        return $this->repo->getById($id);  
    }
}
