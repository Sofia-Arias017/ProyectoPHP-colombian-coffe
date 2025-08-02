<?php

namespace App\UseCases;

use App\Domain\Models\Categorias;
use App\Domain\Repositories\CategoriasRepositoryInterface;

class CreateCategorias
{
    public function __construct(private CategoriasRepositoryInterface $repo) {}

    public function execute(array $data): ?Categorias
    {
        return $this->repo->create($data); 
    }
}
