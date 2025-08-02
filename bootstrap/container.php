<?php

use DI\Container;

use Psr\Http\Message\ResponseFactoryInterface;

use App\Handler\CustomErrorHandler;
use Slim\Handlers\ErrorHandler;
use Slim\Interfaces\ErrorHandlerInterface;


use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Repositories\EloquentUserRepository;

use App\Domain\Repositories\ProductosRepositoryInterface;
use App\Infrastructure\Repositories\EloquentProductosRepository;

use App\Domain\Repositories\PedidosRepositoryInterface;
use App\Infrastructure\Repositories\EloquentPedidosRepository;

use App\Domain\Repositories\DetallesPedidosRepositoryInterface;
use App\Infrastructure\Repositories\EloquentDetallesPedidosRepository;

$container = new Container();

$container->set(UserRepositoryInterface::class,function(){
    return new EloquentUserRepository();
});

$container->set(ProductosRepositoryInterface::class,function(){
    return new EloquentProductosRepository();
});

$container->set(PedidosRepositoryInterface::class,function(){
    return new EloquentPedidosRepository();
});


$container->set(DetallesPedidosRepositoryInterface::class,function(){
    return new EloquentDetallesPedidosRepository();
});

$container->set(ErrorHandlerInterface::class, function () use ($container){
    return new CustomErrorHandler(
        $container->get(ResponseFactoryInterface::class)
    );
});

return $container;