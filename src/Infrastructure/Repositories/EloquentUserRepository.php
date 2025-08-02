<?php
namespace App\Infrastructure\Repositories;

use App\DTOs\UserDTO;
use App\Domain\Models\User;
use Exception;
use App\Domain\Repositories\UserRepositoryInterface;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(UserDTO $dto): User
    {
        // Verifica si el correo ya existe
        $data = $dto->toArray();
        $exists = User::where('email', $data['email'])->first();
        if ($exists) {
            throw new Exception('Error ya existe el usuario');
        }

        return User::create($data);
    }

    public function delete(int $id): bool
    {
        $user = User::find($id);
        if (!$user) {
            throw new Exception('No se encontro el usuario');
        }

        return $user->delete();
    }

    public function getAll(): array
    {
        return User::all()->toArray(); // Sacamos todos los usuarios
    }

    public function update(int $id, UserDTO $dto): bool
    {
        $user = User::find($id);

        // Si no existe usuario
        if (!$user) {
            throw new Exception('El usuario no existe');
        }

        $data = $dto->toArray();

        // Verificar si el email ya esta ocupado
        $emailExistente = User::where('email', $data['email'])
                            ->where('id', '!=', $id)
                            ->first();

        if ($emailExistente) {
            throw new Exception('Este email ya esta en uso');
        }

        return $user->update($data);
    }

    public function getById(int $id): ?User
    {
        // buscar usuario por id
        return User::find($id);
    }

    public function authenticate(string $email, string $password): User
    {
        $user = User::where('email', $email)->first();

        // Si no existe usuario
        if (!$user) {
            throw new Exception('Correo no registrado');
        }

        if ($user->password !== $password) {
            throw new Exception('La contraseña no es correcta');
        }

        return $user;
    }
}
