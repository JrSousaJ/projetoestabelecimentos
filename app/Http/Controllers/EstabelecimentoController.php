<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstabelecimentoIdRequest;
use App\Http\Requests\EstabelecimentoRequest;
use App\Http\Requests\EstabelecimentoUpdateRequest;
use App\Service\EstabelecimentoService;
use Exception;
use Illuminate\Http\Request;

class EstabelecimentoController extends Controller
{
    protected $estabelecimento;
    public function __construct(EstabelecimentoService $estabelecimentoService)
    {
        $this->estabelecimento = $estabelecimentoService;
    }
    public function listaEstabelecimento()
    {
        try{
            $response = [
                'status' => 200,
                'estabelecimento' => $this->estabelecimento->listarEstabelecimento()
            ];
        }catch(Exception $error){
            $response = [
                'status' => 500,
                'error' => 'Falha ao buscar'
            ];
        }
        return response()->json($response, $response['status']);
    }

    public function buscaPorId(EstabelecimentoIdRequest $request)
    {
        try{
            $response = [
                'status' => 200,
                'estabelecimento' => $this->estabelecimento->buscarEstabelecimentoPorId($request)
            ];
        }catch(Exception $error){
            $response = [
                'status' => 422,
                'error' => 'Id não registrado!'
            ];
        }

        return response()->json($response, $response['status']);
    }

    public function salvaEstabelecimento(EstabelecimentoRequest $request)
    {
        try{
            $response = [
                'status' => 201,
                'id' => $this->estabelecimento->salvarEstabelecimento($request)
            ];
        }catch(Exception $error){
            $response = [
                'status' => 500,
                'error' => $error
            ];
        }

        return response()->json($response, $response['status']);
    }

    public function atualizaEstabelecimento(EstabelecimentoUpdateRequest $request)
    {
        try{
            $response = [
                'status' => 200,
                'estabelecimento' => $this->estabelecimento->atualizarEstabelecimento($request)
            ];
        }catch(Exception $error){
            $response = [
                'status' => 422,
                'error' => 'Estabelecimento não encontrado!'
            ];
        }

        return response()->json($response, $response['status']);
    }

    public function excluiEstabelecimento(EstabelecimentoIdRequest $request)
    {
        $response = ['status' => 204];
        try{
            $this->estabelecimento->deletarEstabelecimento($request);
        }catch(Exception $error){
            $response = [
                'status' => 410,
                'error' => 'Não foi possível deletar!'
            ];
        }
        return response('', $response['status']);
    }
}
