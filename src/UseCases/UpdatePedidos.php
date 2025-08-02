<?php

namespace App\UseCases;

use App\Domain\Repositories\PedidosRepositoryInterface;

class UpdatePedidos{

    public function __construct(private PedidosRepositoryInterface $repo){}

    public function execute(int $id,array $data): ?bool{
        return $this->repo->update($id,$data);
    }
}
