<?php

namespace App\UseCases;

use App\Domain\Repositories\ProveedoresRepositoryInterface;

class GetAllProveedores{
    public function __construct(private ProveedoresRepositoryInterface $repo){}
    
    public function execute(): array{
        return $this->repo->getAll();
    }
}
