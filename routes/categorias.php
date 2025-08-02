<?php

use App\Controllers\CategoriasController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/categorias', function ($group) {
        $group->get('', [CategoriasController::class, 'index']);
        $group->get('/{id}', [CategoriasController::class, 'show']);
        $group->post('', [CategoriasController::class, 'store']);
        $group->put('/{id}', [CategoriasController::class, 'update']);
        $group->delete('/{id}', [CategoriasController::class, 'destroy']);
    })->add(new RoleMiddleware('admin'))->add(new AuthMiddleware());
};
