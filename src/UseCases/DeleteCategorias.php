<?php

namespace App\UseCases;

use App\Domain\Repositories\CategoriasRepositoryInterface;

class DeleteCategorias
{
    public function __construct(private CategoriasRepositoryInterface $repo) {}

    public function execute(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
