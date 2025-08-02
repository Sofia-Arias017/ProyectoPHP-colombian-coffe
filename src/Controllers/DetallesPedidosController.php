<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\UseCases\DeleteDetallesPedidos;
use App\UseCases\CreateDetallesPedidos;
use App\UseCases\GetAllDetallesPedidos;
use App\UseCases\GetByIdDetallesPedidos;
use App\UseCases\UpdateDetallesPedidos;
use App\Domain\Repositories\DetallesPedidosRepositoryInterface;

class DetallesPedidosController {
    public function __construct(private DetallesPedidosRepositoryInterface $repo) {}

    public function show(Request $request, Response $response, array $args): Response {
        $useCase = new GetByIdDetallesPedidos($this->repo);
        $id = $args['id']; 
        $detallesPedidos = $useCase->execute($id);
        if (!$detallesPedidos) {
            $response->getBody()->write(json_encode(["err" => "Detalles Pedidos no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($detallesPedidos));
        return $response;
    }
    public function update(Request $request, Response $response, array $args): Response {
        $id = $args['id']; 
        $data = $request->getParsedBody();
        $useCase = new UpdateDetallesPedidos($this->repo);
        $success = $useCase->execute($id, $data);
        if (!$success) {
            $response->getBody()->write(json_encode(["err" => "Detalles Pedidos no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode(['msg' => 'Detalles Pedidos actualizada']));
        return $response->withStatus(200);
    }

    public function destroy(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
    
        $useCase = new DeleteDetallesPedidos($this->repo);
        $success = $useCase->execute($id);
    
        if (!$success) {
            $response->getBody()->write(json_encode([
                "err" => "Detalles Pedidos  no encontrada o ya eliminada"
            ]));
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(json_encode(['msg' => 'Detalles Pedidos eliminada']));
        return $response->withStatus(200);
    }

    public function store(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $useCase = new CreateDetallesPedidos($this->repo);
        $detallesPedidos = $useCase->execute($data);
        $response->getBody()->write(json_encode($detallesPedidos));
        return $response->withStatus(201);
    }

    public function index(Request $request, Response $response): Response {
        $useCase = new GetAllDetallesPedidos($this->repo);
        $detallesPedidos = $useCase->execute();
        $response->getBody()->write(json_encode($detallesPedidos));
        return $response;
    }
}
