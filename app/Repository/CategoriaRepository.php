<?php

namespace App\Repository;

use App\Http\Requests\CategoriaIdRequest;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaRepository {

    protected $categoria;
    public function __construct(Categorias $categoria)
    {
        $this->categoria = $categoria;
    }

    public function listaCategorias()
    {
        $categorias = $this->categoria->all()->map(function ($categoria){
            $categoria->nome = $categoria->nome;
            $categoria->id = $categoria->id;
            return $categoria;
        });
        return $categorias;
    }
    public function buscarPorId(CategoriaIdRequest $request)
    {
        $categoria = $this->categoria->findOrFail($request->id);
        return $categoria;
    }
    public function salvarCategoria(CategoriaRequest $request)
    {
        $idCategoria = $this->categoria->create($request->all())->id;
        return $idCategoria;
    }
    public function atualizarCategoria(CategoriaUpdateRequest $request)
    {
        $categoria = $this->categoria->findOrFail($request->id);
        $categoria->nome = $request->nome;
        $categoria->save();

        return $categoria;
    }
    public function deletarCategoria(CategoriaIdRequest $request)
    {
        $categoria = $this->categoria->findOrFail($request->id);
        $categoria->delete();

        return true;
    }
}
