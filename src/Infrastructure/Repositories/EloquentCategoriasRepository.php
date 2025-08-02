<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Models\Categorias;
use App\Domain\Repositories\CategoriasRepositoryInterface;

class EloquentCategoriasRepository implements CategoriasRepositoryInterface
{
    public function getById(int $id): ?Categorias
    {
        return Categorias::where('id',$id)->first();
    }

    public function getAll(): array
    {
        return Categorias::all()->toArray();
    }

    public function update(int $id, array $data): bool
    {
        $atributo = $this->getById($id);
        return $atributo ? $atributo->update($data) : false;
    }

    public function create(array $data): Categorias
    {
        if (isset($data['id'])) {
            $exists = Categorias::where('id', $data['id'])->first();
            if ($exists) {
                return $exists;
            }
        }

        return Categorias::create($data);
    }

    public function delete(int $id): bool
    {
        $atributo = Categorias::find($id);
        if (!$atributo) {
            return false; 
        }

        return $atributo->delete();
    }
}
