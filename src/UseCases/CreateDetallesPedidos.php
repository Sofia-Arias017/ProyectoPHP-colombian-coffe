<?php

namespace App\UseCases;

use App\Domain\Models\DetallesPedidos;
use App\Domain\Repositories\DetallesPedidosRepositoryInterface;

class CreateDetallesPedidos
{
    public function __construct(private DetallesPedidosRepositoryInterface $repo) {}

    public function execute(array $data): ?DetallesPedidos
    {
        return $this->repo->create($data); 
    }
}
