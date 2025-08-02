<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Inventario;
use App\Domain\Repositories\InventarioRepositoryInterface;

class EloquentInventarioRepository implements InventarioRepositoryInterface
{
    public function getById(int $id): ?Inventario
    {
        return Inventario::where('id',$id)->first();
    }

    public function getAll(): array
    {
        return Inventario::all()->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $atributo = $this->getById($id);
        return $atributo ? $atributo->update($data) : false;
    }

    public function create(array $data): Inventario
    {
        if (isset($data['id'])) {
            $exists = Inventario::where('id', $data['id'])->first();
            if ($exists) {
                return $exists;
            }
        }

        return Inventario::create($data);
    }

    public function delete(int $id): bool
    {
        $atributo = Inventario::find($id);
        if (!$atributo) {
            return false; 
        }

        return $atributo->delete();
    }
}
