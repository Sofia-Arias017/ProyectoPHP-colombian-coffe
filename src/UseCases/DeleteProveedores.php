<?php

namespace App\UseCases;

use App\Domain\Repositories\ProveedoresRepositoryInterface;

class DeleteProveedores
{
    public function __construct(private ProveedoresRepositoryInterface $repo) {}

    public function execute(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
