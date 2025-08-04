<?php

use App\Controllers\DetallesPedidosController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/detalles_pedido', function ($group) {
        $group->get('', [DetallesPedidosController::class, 'index']);
        $group->get('/{id}', [DetallesPedidosController::class, 'show']);
        $group->post('', [DetallesPedidosController::class, 'store']);
        $group->put('/{id}', [DetallesPedidosController::class, 'update']);
        $group->delete('/{id}', [DetallesPedidosController::class, 'destroy']);
    });
};
