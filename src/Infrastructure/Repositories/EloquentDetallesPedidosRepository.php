<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\DetallesPedidos;
use App\Domain\Repositories\DetallesPedidosRepositoryInterface;

class EloquentDetallesPedidosRepository implements DetallesPedidosRepositoryInterface
{
    public function getById(int $id): ?DetallesPedidos
    {
        return DetallesPedidos::where('id',$id)->first();
    }

    public function getAll(): array
    {
        return DetallesPedidos::all()->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $atributo = $this->getById($id);
        return $atributo ? $atributo->update($data) : false;
    }

    public function create(array $data): DetallesPedidos
    {
        if (isset($data['id'])) {
            $exists = DetallesPedidos::where('id', $data['id'])->first();
            if ($exists) {
                return $exists;
            }
        }

        return DetallesPedidos::create($data);
    }

    public function delete(int $id): bool
    {
        $atributo = DetallesPedidos::find($id);
        if (!$atributo) {
            return false; 
        }

        return $atributo->delete();
    }
}
