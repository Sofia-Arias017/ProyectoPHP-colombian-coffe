<?php

use App\Controllers\ProveedoresController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/proveedores', function ($group) {
        $group->get('', [ProveedoresController::class, 'index']);
        $group->get('/{id}', [ProveedoresController::class, 'show']);
        $group->post('', [ProveedoresController::class, 'store']);
        $group->put('/{id}', [ProveedoresController::class, 'update']);
        $group->delete('/{id}', [ProveedoresController::class, 'destroy']);
    });
};
