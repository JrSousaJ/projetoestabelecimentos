<?php

namespace App\Service;

use App\Http\Requests\EstabelecimentoIdRequest;
use App\Http\Requests\EstabelecimentoRequest;
use App\Http\Requests\EstabelecimentoUpdateRequest;
use App\Repository\EstabelecimentoRepository;

class EstabelecimentoService
{
    protected $estabelecimento;
    public function __construct(EstabelecimentoRepository $estabelecimento)
    {
        $this->estabelecimento = $estabelecimento;
    }
    public function listarEstabelecimento()
    {
        return $this->estabelecimento->listarEstabelecimentos();
    }
    public function buscarEstabelecimentoPorId(EstabelecimentoIdRequest $request)
    {
        return $this->estabelecimento->buscarPorId($request);
    }
    public function salvarEstabelecimento(EstabelecimentoRequest $request)
    {
        return $this->estabelecimento->salvarEstabelecimento($request);
    }
    public function atualizarEstabelecimento(EstabelecimentoUpdateRequest $request)
    {
        return $this->estabelecimento->atualizarEstabelecimento($request);
    }
    public function deletarEstabelecimento(EstabelecimentoIdRequest $request)
    {
        return $this->estabelecimento->deletarEstabelecimento($request);
    }
}
