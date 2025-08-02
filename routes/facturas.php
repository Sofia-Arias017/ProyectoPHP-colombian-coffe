<?php

use App\Controllers\FacturasController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/facturas', function ($group) {
        $group->get('', [FacturasController::class, 'index']);
        $group->get('/{id}', [FacturasController::class, 'show']);
        $group->post('', [FacturasController::class, 'store']);
        $group->put('/{id}', [FacturasController::class, 'update']);
        $group->delete('/{id}', [FacturasController::class, 'destroy']);
    })->add(new RoleMiddleware('admin'))->add(new AuthMiddleware());
};
