<?php

namespace App\UseCases;

use App\Domain\Repositories\FacturasRepositoryInterface;

class UpdateFacturas{

    public function __construct(private FacturasRepositoryInterface $repo){}

    public function execute(int $id,array $data): ?bool{
        return $this->repo->update($id,$data);
    }
}
