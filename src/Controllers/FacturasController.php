<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\UseCases\DeleteFacturas;
use App\UseCases\CreateFacturas;
use App\UseCases\GetAllFacturas;
use App\UseCases\GetByIdFacturas;
use App\UseCases\UpdateFacturas;
use App\Domain\Repositories\FacturasRepositoryInterface;
use App\DTOs\FacturasDTO;

class FacturasController {
    public function __construct(private FacturasRepositoryInterface $repo) {}

    public function show(Request $request, Response $response, array $args): Response {
        $useCase = new GetByIdFacturas($this->repo);
        $id = $args['id']; 
        $factura = $useCase->execute($id);
        if (!$factura) {
            $response->getBody()->write(json_encode(["err" => "Factura no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($factura));
        return $response;
    }
    public function update(Request $request, Response $response, array $args): Response {
        $id = $args['id']; 
        $data = $request->getParsedBody();
        $data = FacturasDTO::fromArray($data);
        $useCase = new UpdateFacturas($this->repo);
        $success = $useCase->execute($id, $data);
        if (!$success) {
            $response->getBody()->write(json_encode(["err" => "Factura no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode(['msg' => 'Factura actualizada']));
        return $response->withStatus(200);
    }

    public function destroy(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
    
        $useCase = new DeleteFacturas($this->repo);
        $success = $useCase->execute($id);
    
        if (!$success) {
            $response->getBody()->write(json_encode([
                "err" => "Factura no encontrada o ya eliminada"
            ]));
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(json_encode(['msg' => 'Factura eliminada']));
        return $response->withStatus(200);
    }

    public function store(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $data = FacturasDTO::fromArray($data);
        $useCase = new CreateFacturas($this->repo);
        $factura = $useCase->execute($data);
        $response->getBody()->write(json_encode($factura));
        return $response->withStatus(201);
    }

    public function index(Request $request, Response $response): Response {
        $useCase = new GetAllFacturas($this->repo);
        $factura = $useCase->execute();
        $response->getBody()->write(json_encode($factura));
        return $response;
    }
}
