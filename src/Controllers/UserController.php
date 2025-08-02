<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use App\DTOs\UserDTO;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\Repositories\UserRepositoryInterface;

class UserController
{
    public function __construct(private UserRepositoryInterface $repo) {}

    // ELIMINAR
    public function deleteUser(Request $request, Response $response, array $args): Response {
        $id = (int)$args['id'];

        try {
            $success = $this->repo->delete($id);

            if (!$success) {
                throw new \Exception('No se pudo borrar');
            }

            $response->getBody()->write(json_encode(['msg' => 'Usuario eliminado']));
            return $response->withStatus(200);
        } catch (\Exception $e) {
            $response->getBody()->write(json_encode(['err' => $e->getMessage()]));
            return $response->withStatus(400);
        }
    }

    // OBTENER POR ID
    public function getUserById(Request $request, Response $response, array $args): Response {
        $id = (int)$args['id'];
        $user = $this->repo->getById($id);

        if (!$user) {
            $response->getBody()->write(json_encode(['err' => 'No encontrado']));
            return $response->withStatus(404);
        }

        $response->getBody()->write(json_encode($user));
        return $response->withStatus(200);
    }

    // CREAR ADMIN
    public function createAdmin(Request $request, Response $response): Response {
        $data = $request->getParsedBody();

        $dto = new UserDTO(
            nombre: $data['nombre'] ?? '',
            email: $data['correo'] ?? '',
            password: $data['contraseña'] ?? '',
            rol: 'admin',
        );

        $user = $this->repo->create($dto);
        $response->getBody()->write(json_encode($user));
        return $response->withStatus(201);
    }

    // OBTENER TODOS
    public function getAllUsers(Request $request, Response $response): Response {
        $users = $this->repo->getAll();
        $response->getBody()->write(json_encode($users));
        return $response->withStatus(200);
    }

    // CREAR USUARIO
    public function createUser(Request $request, Response $response): Response {
        $data = $request->getParsedBody();

        $dto = new UserDTO(
            nombre: $data['nombre'] ?? '',
            email: $data['correo'] ?? '',
            password: $data['contraseña'] ?? '',
            rol: 'user',
        );

        try {
            $user = $this->repo->create($dto);

            $response->getBody()->write(json_encode([
                'msg' => 'Usuario creado',
                'user' => $user
            ]));

            return $response->withStatus(201);
        } catch (\Exception $e) {
            $response->getBody()->write(json_encode([
                'err' => $e->getMessage()
            ]));

            return $response->withStatus(400);
        }
    }

    // ACTUALIZAR
    public function updateUser(Request $request, Response $response, array $args): Response {
        $id = (int)$args['id'];
        $data = $request->getParsedBody();

        $dto = new UserDTO(
            nombre: $data['nombre'] ?? '',
            email: $data['email'] ?? '',
            password: $data['password'] ?? '',
            rol: $data['rol'] ?? 'user',
        );

        try {
            $success = $this->repo->update($id, $dto);

            if (!$success) {
                throw new \Exception('No se pudo actulizar');
            }

            $response->getBody()->write(json_encode(['msg' => 'uUsuario actualizado']));
            return $response->withStatus(200);
        } catch (\Exception $e) {
            $response->getBody()->write(json_encode(['err' => $e->getMessage()]));
            return $response->withStatus(400);
        }
    }
}
