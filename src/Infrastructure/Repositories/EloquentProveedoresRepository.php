<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Proveedores;
use App\Domain\Repositories\ProveedoresRepositoryInterface;

class EloquentProveedoresRepository implements ProveedoresRepositoryInterface
{
    public function getById(int $id): ?Proveedores
    {
        return Proveedores::where('id',$id)->first();
    }

    public function getAll(): array
    {
        return Proveedores::all()->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $atributo = $this->getById($id);
        return $atributo ? $atributo->update($data) : false;
    }

    public function create(array $data): Proveedores
    {
        if (isset($data['id'])) {
            $exists = Proveedores::where('id', $data['id'])->first();
            if ($exists) {
                return $exists;
            }
        }

        return Proveedores::create($data);
    }

    public function delete(int $id): bool
    {
        $atributo = Proveedores::find($id);
        if (!$atributo) {
            return false; 
        }

        return $atributo->delete();
    }
}
