<?php

use DI\Container;

use Psr\Http\Message\ResponseFactoryInterface;

use App\Handler\CustomErrorHandler;
use Slim\Handlers\ErrorHandler;
use Slim\Interfaces\ErrorHandlerInterface;


use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Repositories\EloquentUserRepository;

$container = new Container();

$container->set(UserRepositoryInterface::class,function(){
    return new EloquentUserRepository();
});



$container->set(ErrorHandlerInterface::class, function () use ($container){
    return new CustomErrorHandler(
        $container->get(ResponseFactoryInterface::class)
    );
});

return $container;