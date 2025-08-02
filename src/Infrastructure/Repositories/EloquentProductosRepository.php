<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Productos;
use App\Domain\Repositories\ProductosRepositoryInterface;

class EloquentProductosRepository implements ProductosRepositoryInterface
{
    public function getById(int $id): ?Productos
    {
        return Productos::where('id',$id)->first();
    }

    public function getAll(): array
    {
        return Productos::all()->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $atributo = $this->getById($id);
        return $atributo ? $atributo->update($data) : false;
    }

    public function create(array $data): Productos
    {
        if (isset($data['id'])) {
            $exists = Productos::where('id', $data['id'])->first();
            if ($exists) {
                return $exists;
            }
        }

        return Productos::create($data);
    }

    public function delete(int $id): bool
    {
        $atributo = Productos::find($id);
        if (!$atributo) {
            return false; //
        }

        return $atributo->delete();
    }
}
