<?php

namespace App\UseCases;

use App\DTOs\UserDTO;
use App\Domain\Repositories\UserRepositoryInterface;

// ACTULISAR 
class UpdateUsers{

    public function __construct(private UserRepositoryInterface $repo){}

    public function execute(int $id, UserDTO $dto): bool {
        return $this->repo->update($id,$dto); // lo cambia si se deja
    }
}
