<?php

namespace App\DTOs;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;
use InvalidArgumentException;

class PedidosDTO
{
    public static function fromArray(array $data): array
    {
        try {
            v::key('estado', v::in(['pendiente', 'procesando','cancelado']))
             ->assert($data);
        } catch (ValidationException $e) {
            throw new InvalidArgumentException('Campos invalidos');
        }

        return $data;
    }
}
