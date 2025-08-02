<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Facturas;
use App\Domain\Repositories\FacturasRepositoryInterface;

class EloquentFacturasRepository implements FacturasRepositoryInterface
{
    public function getById(int $id): ?Facturas
    {
        return Facturas::where('id',$id)->first();
    }

    public function getAll(): array
    {
        return Facturas::all()->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $atributo = $this->getById($id);
        return $atributo ? $atributo->update($data) : false;
    }

    public function create(array $data): Facturas
    {
        if (isset($data['id'])) {
            $exists = Facturas::where('id', $data['id'])->first();
            if ($exists) {
                return $exists;
            }
        }

        return Facturas::create($data);
    }

    public function delete(int $id): bool
    {
        $atributo = Facturas::find($id);
        if (!$atributo) {
            return false; 
        }

        return $atributo->delete();
    }
}
