<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaIdRequest;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Service\CategoriaService;
use Exception;

class CategoriaController extends Controller
{
    protected $categoria;
    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoria = $categoriaService;
    }
    public function listaCategorias()
    {
        try{
            $response = [
                'status' => 200,
                'categoria' => $this->categoria->listarCategorias()
            ];
        }catch(Exception $error){
            $response = [
                'status' => 500,
                'error' => 'Falha ao buscar'
            ];
        }
        return response()->json($response, $response['status']);
    }

    public function buscaPorId(CategoriaIdRequest $request)
    {
        try{
            $response = [
                'status' => 200,
                'categoria' => $this->categoria->buscarCategoriaPorId($request)
            ];
        }catch(Exception $error){
            $response = [
                'status' => 422,
                'error' => 'Id não registrado!'
            ];
        }

        return response()->json($response, $response['status']);
    }

    public function salvaCategoria(CategoriaRequest $request)
    {
        try{
            $response = [
                'status' => 201,
                'id' => $this->categoria->salvarCategoria($request)
            ];
        }catch(Exception $error){
            $response = [
                'status' => 422,
                'error' => 'Não foi possível salvar!'
            ];
        }

        return response()->json($response, $response['status']);
    }

    public function atualizaCategoria(CategoriaUpdateRequest $request)
    {
        try{
            $response = [
                'status' => 200,
                'categoria' => $this->categoria->atualizarCategoria($request)
            ];
        }catch(Exception $error){
            $response = [
                'status' => 422,
                'error' => 'Não foi possível atualizar!'
            ];
        }

        return response()->json($response, $response['status']);
    }

    public function excluiCategoria(CategoriaIdRequest $request)
    {
        $response = ['status' => 204];
        try{
            $this->categoria->deletarCategoria($request);
        }catch(Exception $error){
            $response = [
                'status' => 410,
                'error' => 'Não foi possível deletar!'
            ];
        }
        return response('', $response['status']);
    }

}
