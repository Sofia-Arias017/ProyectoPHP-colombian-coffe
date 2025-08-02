<?php

use App\Controllers\InventarioController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/inventario', function ($group) {
        $group->get('', [InventarioController::class, 'index']);
        $group->get('/{id}', [InventarioController::class, 'show']);
        $group->post('', [InventarioController::class, 'store']);
        $group->put('/{id}', [InventarioController::class, 'update']);
        $group->delete('/{id}', [InventarioController::class, 'destroy']);
    })->add(new RoleMiddleware('admin'))->add(new AuthMiddleware());
};
