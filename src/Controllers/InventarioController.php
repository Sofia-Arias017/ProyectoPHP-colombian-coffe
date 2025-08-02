<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\UseCases\DeleteInventario;
use App\UseCases\CreateInventario;
use App\UseCases\GetAllInventario;
use App\UseCases\GetByIdInventario;
use App\UseCases\UpdateInventario;
use App\Domain\Repositories\InventarioRepositoryInterface;

class InventarioController {
    public function __construct(private InventarioRepositoryInterface $repo) {}

    public function show(Request $request, Response $response, array $args): Response {
        $useCase = new GetByIdInventario($this->repo);
        $id = $args['id']; 
        $inventario = $useCase->execute($id);
        if (!$inventario) {
            $response->getBody()->write(json_encode(["err" => "Inventario no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($inventario));
        return $response;
    }
    public function update(Request $request, Response $response, array $args): Response {
        $id = $args['id']; 
        $data = $request->getParsedBody();
        $useCase = new UpdateInventario($this->repo);
        $success = $useCase->execute($id, $data);
        if (!$success) {
            $response->getBody()->write(json_encode(["err" => "Inventario no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode(['msg' => 'Inventario actualizada']));
        return $response->withStatus(200);
    }

    public function destroy(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
    
        $useCase = new DeleteInventario($this->repo);
        $success = $useCase->execute($id);
    
        if (!$success) {
            $response->getBody()->write(json_encode([
                "err" => "Inventario no encontrada o ya eliminada"
            ]));
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(json_encode(['msg' => 'Inventario eliminada']));
        return $response->withStatus(200);
    }

    public function store(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $useCase = new CreateInventario($this->repo);
        $inventario = $useCase->execute($data);
        $response->getBody()->write(json_encode($inventario));
        return $response->withStatus(201);
    }

    public function index(Request $request, Response $response): Response {
        $useCase = new GetAllInventario($this->repo);
        $inventario = $useCase->execute();
        $response->getBody()->write(json_encode($inventario));
        return $response;
    }
}
