<?php

namespace App\UseCases;

use App\Domain\Repositories\DetallesPedidosRepositoryInterface;

class UpdateDetallesPedidos{

    public function __construct(private DetallesPedidosRepositoryInterface $repo){}

    public function execute(int $id,array $data): ?bool{
        return $this->repo->update($id,$data);
    }
}
