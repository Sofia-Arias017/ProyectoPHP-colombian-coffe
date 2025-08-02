<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\UseCases\DeleteProveedores;
use App\UseCases\CreateProveedores;
use App\UseCases\GetAllProveedores;
use App\UseCases\GetByIdProveedores;
use App\UseCases\UpdateProveedores;
use App\Domain\Repositories\ProveedoresRepositoryInterface;

class ProveedoresController {
    public function __construct(private ProveedoresRepositoryInterface $repo) {}

    public function show(Request $request, Response $response, array $args): Response {
        $useCase = new GetByIdProveedores($this->repo);
        $id = $args['id']; 
        $proveedor = $useCase->execute($id);
        if (!$proveedor) {
            $response->getBody()->write(json_encode(["err" => "Proveedores no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($proveedor));
        return $response;
    }
    public function update(Request $request, Response $response, array $args): Response {
        $id = $args['id']; 
        $data = $request->getParsedBody();
        $useCase = new UpdateProveedores($this->repo);
        $success = $useCase->execute($id, $data);
        if (!$success) {
            $response->getBody()->write(json_encode(["err" => "Proveedores no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode(['msg' => 'Proveedores actualizada']));
        return $response->withStatus(200);
    }

    public function destroy(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
    
        $useCase = new DeleteProveedores($this->repo);
        $success = $useCase->execute($id);
    
        if (!$success) {
            $response->getBody()->write(json_encode([
                "err" => "Proveedores no encontrada o ya eliminada"
            ]));
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(json_encode(['msg' => 'Proveedores eliminada']));
        return $response->withStatus(200);
    }

    public function store(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $useCase = new CreateProveedores($this->repo);
        $proveedor = $useCase->execute($data);
        $response->getBody()->write(json_encode($proveedor));
        return $response->withStatus(201);
    }

    public function index(Request $request, Response $response): Response {
        $useCase = new GetAllProveedores($this->repo);
        $proveedor = $useCase->execute();
        $response->getBody()->write(json_encode($proveedor));
        return $response;
    }
}
