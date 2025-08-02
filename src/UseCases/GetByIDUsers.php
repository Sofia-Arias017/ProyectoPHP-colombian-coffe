<?php

namespace App\UseCases;

use App\Domain\Models\User;
use App\Domain\Repositories\UserRepositoryInterface;

// Buscar por ID ese user
class GetByIDUsers{

    public function __construct(private UserRepositoryInterface $repo){}

    public function execute(int $id): ?User {
        return $this->repo->getById($id); 
    }
}
