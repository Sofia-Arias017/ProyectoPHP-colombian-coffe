<?php

namespace App\DTOs;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;
use InvalidArgumentException;

class FacturasDTO
{
    public static function fromArray(array $data): array
    {
        try {
            v::key('estado_pago', v::in(['pendiente', 'procesando','vencido']))
             ->assert($data);
        } catch (ValidationException $e) {
            throw new InvalidArgumentException('Campos invalidos');
        }

        return $data;
    }
}
