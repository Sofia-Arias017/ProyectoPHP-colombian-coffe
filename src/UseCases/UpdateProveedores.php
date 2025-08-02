<?php

namespace App\UseCases;

use App\Domain\Repositories\ProveedoresRepositoryInterface;

class UpdateProveedores{

    public function __construct(private ProveedoresRepositoryInterface $repo){}

    public function execute(int $id,array $data): ?bool{
        return $this->repo->update($id,$data);
    }
}
