<?php

namespace App\UseCases;

use App\Domain\Repositories\InventarioRepositoryInterface;

class UpdateInventario{

    public function __construct(private InventarioRepositoryInterface $repo){}

    public function execute(int $id,array $data): ?bool{
        return $this->repo->update($id,$data);
    }
}
