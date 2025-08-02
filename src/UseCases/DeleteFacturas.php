<?php

namespace App\UseCases;

use App\Domain\Repositories\FacturasRepositoryInterface;

class DeleteFacturas
{
    public function __construct(private FacturasRepositoryInterface $repo) {}

    public function execute(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
