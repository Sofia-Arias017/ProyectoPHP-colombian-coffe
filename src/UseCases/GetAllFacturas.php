<?php

namespace App\UseCases;

use App\Domain\Repositories\FacturasRepositoryInterface;

class GetAllFacturas{
    public function __construct(private FacturasRepositoryInterface $repo){}
    
    public function execute(): array{
        return $this->repo->getAll();
    }
}
