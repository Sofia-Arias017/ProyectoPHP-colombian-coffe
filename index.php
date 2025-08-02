<?php
require_once "vendor/autoload.php";

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use App\Infrastructure\Database\Connection;
use Psr\Http\Message\ResponseFactoryInterface;
use App\Handler\CustomErrorHandler;
use Slim\Interfaces\ErrorHandlerInterface;

$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

Connection::init();

$container = require_once 'bootstrap/container.php';
AppFactory::setContainer($container);

$app = AppFactory::create();

$container->set(ResponseFactoryInterface::class, $app->getResponseFactory());

$errorHanlder = $app->addErrorMiddleware(true, true, true);
$errorHanlder->setDefaultErrorHandler($container->get(ErrorHandlerInterface::class));

(require_once 'public/index.php')($app);

(require_once 'routes/users.php')($app);


$app->run();
