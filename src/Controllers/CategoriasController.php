<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\UseCases\DeleteCategorias;
use App\UseCases\CreateCategorias;
use App\UseCases\GetAllCategorias;
use App\UseCases\GetByIdCategorias;
use App\UseCases\UpdateCategorias;
use App\Domain\Repositories\CategoriasRepositoryInterface;

class CategoriasController {
    public function __construct(private CategoriasRepositoryInterface $repo) {}

    public function show(Request $request, Response $response, array $args): Response {
        $useCase = new GetByIdCategorias($this->repo);
        $id = $args['id']; 
        $categoria = $useCase->execute($id);
        if (!$categoria) {
            $response->getBody()->write(json_encode(["err" => "Categorias no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($categoria));
        return $response;
    }
    public function update(Request $request, Response $response, array $args): Response {
        $id = $args['id']; 
        $data = $request->getParsedBody();
        $useCase = new UpdateCategorias($this->repo);
        $success = $useCase->execute($id, $data);
        if (!$success) {
            $response->getBody()->write(json_encode(["err" => "Categorias no registrada"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode(['msg' => 'Categorias actualizada']));
        return $response->withStatus(200);
    }

    public function destroy(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
    
        $useCase = new DeleteCategorias($this->repo);
        $success = $useCase->execute($id);
    
        if (!$success) {
            $response->getBody()->write(json_encode([
                "err" => "Categorias no encontrada o ya eliminada"
            ]));
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(json_encode(['msg' => 'Categorias eliminada']));
        return $response->withStatus(200);
    }

    public function store(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $useCase = new CreateCategorias($this->repo);
        $categoria = $useCase->execute($data);
        $response->getBody()->write(json_encode($categoria));
        return $response->withStatus(201);
    }

    public function index(Request $request, Response $response): Response {
        $useCase = new GetAllCategorias($this->repo);
        $categoria = $useCase->execute();
        $response->getBody()->write(json_encode($categoria));
        return $response;
    }
}
