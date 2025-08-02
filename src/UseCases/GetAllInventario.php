<?php

namespace App\UseCases;

use App\Domain\Repositories\InventarioRepositoryInterface;

class GetAllInventario{
    public function __construct(private InventarioRepositoryInterface $repo){}
    
    public function execute(): array{
        return $this->repo->getAll();
    }
}
