<?php

namespace App\Service;

use App\Http\Requests\CategoriaIdRequest;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Repository\CategoriaRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Constraint\ExceptionMessage;

class CategoriaService
{
    protected $categoriarepository;
    public function __construct(CategoriaRepository $categoriarepository)
    {
        $this->categoriarepository = $categoriarepository;
    }
    public function listarCategorias()
    {
        return  $this->categoriarepository->listaCategorias();
    }
    public function buscarCategoriaPorId(CategoriaIdRequest $request)
    {
        return $this->categoriarepository->buscarPorId($request);
    }
    public function salvarCategoria(CategoriaRequest $request)
    {
        return $this->categoriarepository->salvarCategoria($request);
    }
    public function atualizarCategoria(CategoriaUpdateRequest $request)
    {
        return $this->categoriarepository->atualizarCategoria($request);
    }
    public function deletarCategoria(CategoriaIdRequest $request)
    {
        return $this->categoriarepository->deletarCategoria($request);
    }
}
