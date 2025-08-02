<?php

namespace App\Handler;

use Slim\Exception\HttpUnauthorizedException;
use Slim\Interfaces\ErrorHandlerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Exception\HttpMethodNotAllowedException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use InvalidArgumentException;
use Slim\Exception\HttpNotFoundException;
use Throwable;

class CustomErrorHandler implements ErrorHandlerInterface
{
    public function __construct(private ResponseFactoryInterface $response) {}

    public function __invoke(ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails, bool $logErrors, bool $logErrorDetails): ResponseInterface
    {
        $status = 500;
        $message = $displayErrorDetails ? $exception->getMessage() : "Error en el server.";

        if ($exception instanceof HttpNotFoundException) {
            $status = 404;
            $message = "Ruta no encontrada";
        } elseif ($exception instanceof InvalidArgumentException) {
            $status = 422;
            $message = $exception->getMessage();
        } elseif ($exception instanceof HttpUnauthorizedException) {
            $status = 401;
            $message = "No autorizao";
        } elseif ($exception instanceof HttpMethodNotAllowedException) {
            $status = 405;
            $message = $displayErrorDetails ? $exception->getMessage() : "Error en el server.";
        }

        $response = $this->response->createResponse($status);
        $response->getBody()->write(json_encode(['error' => $message])); // Mensaje de error
        return $response->withHeader('Content-Type', 'application/json');
    }
}
