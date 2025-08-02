<?php

namespace App\UseCases;

use App\Domain\Models\Categorias;
use App\Domain\Repositories\CategoriasRepositoryInterface;

class GetByIdCategorias{

    public function __construct(private CategoriasRepositoryInterface $repo){}

    public function execute(int $id): ?Categorias {
        return $this->repo->getById($id);  
    }
}
