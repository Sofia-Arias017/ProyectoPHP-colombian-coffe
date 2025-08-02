<?php

namespace App\UseCases;

use App\Domain\Models\Inventario;
use App\Domain\Repositories\InventarioRepositoryInterface;

class CreateInventario
{
    public function __construct(private InventarioRepositoryInterface $repo) {}

    public function execute(array $data): ?Inventario
    {
        return $this->repo->create($data); 
    }
}
