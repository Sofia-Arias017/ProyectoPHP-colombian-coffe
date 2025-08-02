<?php

namespace App\UseCases;

use App\Domain\Models\Facturas;
use App\Domain\Repositories\FacturasRepositoryInterface;

class GetByIdFacturas{

    public function __construct(private FacturasRepositoryInterface $repo){}

    public function execute(int $id): ?Facturas {
        return $this->repo->getById($id);  
    }
}
