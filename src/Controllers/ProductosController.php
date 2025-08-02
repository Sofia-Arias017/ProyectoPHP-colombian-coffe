<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\UseCases\DeleteProductos;
use App\UseCases\CreateProductos;
use App\UseCases\GetAllProductos;
use App\UseCases\GetByIdProductos;
use App\UseCases\UpdateProductos;
use App\Domain\Repositories\ProductosRepositoryInterface;

class ProductosController {
    public function __construct(private ProductosRepositoryInterface $repo) {}

    public function show(Request $request, Response $response, array $args): Response {
        $useCase = new GetByIdProductos($this->repo);
        $id = $args['id']; 
        $producto = $useCase->execute($id);
        if (!$producto) {
            $response->getBody()->write(json_encode(["err" => "Producto no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($producto));
        return $response;
    }
    public function update(Request $request, Response $response, array $args): Response {
        $id = $args['id']; 
        $data = $request->getParsedBody();
        $useCase = new UpdateProductos($this->repo);
        $success = $useCase->execute($id, $data);
        if (!$success) {
            $response->getBody()->write(json_encode(["err" => "Producto no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode(['msg' => 'Producto actualizada']));
        return $response->withStatus(200);
    }

    public function destroy(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
    
        $useCase = new DeleteProductos($this->repo);
        $success = $useCase->execute($id);
    
        if (!$success) {
            $response->getBody()->write(json_encode([
                "err" => "Producto no encontrada o ya eliminada"
            ]));
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(json_encode(['msg' => 'Producto eliminada']));
        return $response->withStatus(200);
    }

    public function store(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $useCase = new CreateProductos($this->repo);
        $producto = $useCase->execute($data);
        $response->getBody()->write(json_encode($producto));
        return $response->withStatus(201);
    }

    public function index(Request $request, Response $response): Response {
        $useCase = new GetAllProductos($this->repo);
        $producto = $useCase->execute();
        $response->getBody()->write(json_encode($producto));
        return $response;
    }
}
