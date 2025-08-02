<?php

namespace App\UseCases;

use App\Domain\Repositories\ProductosRepositoryInterface;

class UpdateProductos{

    public function __construct(private ProductosRepositoryInterface $repo){}

    public function execute(int $id,array $data): ?bool{
        return $this->repo->update($id,$data);
    }
}
