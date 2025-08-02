<?php

namespace App\UseCases;

use App\Domain\Repositories\InventarioRepositoryInterface;

class DeleteInventario
{
    public function __construct(private InventarioRepositoryInterface $repo) {}

    public function execute(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
