<?php

use App\Controllers\PedidosController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/pedidos', function ($group) {
        $group->get('', [PedidosController::class, 'index']);
        $group->get('/{id}', [PedidosController::class, 'show']);
        $group->post('', [PedidosController::class, 'store']);
        $group->put('/{id}', [PedidosController::class, 'update']);
        $group->delete('/{id}', [PedidosController::class, 'destroy']);
    });
};
