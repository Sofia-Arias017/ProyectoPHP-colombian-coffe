<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Pedidos;
use App\Domain\Repositories\PedidosRepositoryInterface;

class EloquentPedidosRepository implements PedidosRepositoryInterface
{
    public function getById(int $id): ?Pedidos
    {
        return Pedidos::where('id',$id)->first();
    }

    public function getAll(): array
    {
        return Pedidos::all()->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $atributo = $this->getById($id);
        return $atributo ? $atributo->update($data) : false;
    }

    public function create(array $data): Pedidos
    {
        if (isset($data['id'])) {
            $exists = Pedidos::where('id', $data['id'])->first();
            if ($exists) {
                return $exists;
            }
        }

        return Pedidos::create($data);
    }

    public function delete(int $id): bool
    {
        $atributo = Pedidos::find($id);
        if (!$atributo) {
            return false; 
        }

        return $atributo->delete();
    }
}
