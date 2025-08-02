<?php

namespace App\UseCases;

use App\Domain\Models\Proveedores;
use App\Domain\Repositories\ProveedoresRepositoryInterface;

class CreateProveedores
{
    public function __construct(private ProveedoresRepositoryInterface $repo) {}

    public function execute(array $data): ?Proveedores
    {
        return $this->repo->create($data); 
    }
}
