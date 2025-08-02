<?php

namespace App\UseCases;

use App\Domain\Models\Facturas;
use App\Domain\Repositories\FacturasRepositoryInterface;

class CreateFacturas
{
    public function __construct(private FacturasRepositoryInterface $repo) {}

    public function execute(array $data): ?Facturas
    {
        return $this->repo->create($data); 
    }
}
