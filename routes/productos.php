<?php

use App\Controllers\ProductosController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/productos', function ($group) {
        $group->get('', [ProductosController::class, 'index']);
        $group->get('/{id}', [ProductosController::class, 'show']);
        $group->post('', [ProductosController::class, 'store']);
        $group->put('/{id}', [ProductosController::class, 'update']);
        $group->delete('/{id}', [ProductosController::class, 'destroy']);
    })->add(new RoleMiddleware('admin'))->add(new AuthMiddleware());
};
