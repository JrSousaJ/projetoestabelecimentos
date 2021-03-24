<?php

namespace App\Repository;

use App\Http\Requests\EstabelecimentoIdRequest;
use App\Http\Requests\EstabelecimentoRequest;
use App\Http\Requests\EstabelecimentoUpdateRequest;
use App\Models\Estabelecimentos;

class EstabelecimentoRepository
{
    protected $estabelecimento;
    public function __construct(Estabelecimentos $estabelecimento)
    {
        $this->estabelecimento = $estabelecimento;
    }
    public function listarEstabelecimentos()
    {
        $estabelecimento = $this->estabelecimento->all();
        return $estabelecimento;
    }
    public function buscarPorId(EstabelecimentoIdRequest $request)
    {
        $estabelecimento = $this->estabelecimento->findOrFail($request->id);
        return $estabelecimento;
    }
    public function salvarEstabelecimento(EstabelecimentoRequest $request)
    {
        $this->estabelecimento->razao_social = $request->razao_social;
        $this->estabelecimento->nome_fantasia = $request->nome_fantasia;
        $this->estabelecimento->cnpj = $request->cnpj;
        $this->estabelecimento->email = $request->email;
        $this->estabelecimento->endereco = $request->endereco;
        $this->estabelecimento->cidade = $request->cidade;
        $this->estabelecimento->estado = $request->estado;
        $this->estabelecimento->telefone = $request->telefone;
        $this->estabelecimento->data_cadastro = $request->data_cadastro;
        $this->estabelecimento->status = $request->status;
        $this->estabelecimento->agencia = $request->agencia;
        $this->estabelecimento->conta = $request->conta;
        $this->estabelecimento->categoria_id = $request->categoria_id;

        $idEstabelecimento = $this->estabelecimento->save();

        return $idEstabelecimento;
    }
    public function atualizarEstabelecimento(EstabelecimentoUpdateRequest $request)
    {
        $estabelecimento = $this->estabelecimento->findOrFail($request->id_estabelecimento);

        $estabelecimento->razao_social = $request->razao_social;
        $estabelecimento->nome_fantasia = $request->nome_fantasia;
        $estabelecimento->cnpj = $request->cnpj;
        $estabelecimento->email = $request->email;
        $estabelecimento->endereco = $request->endereco;
        $estabelecimento->cidade = $request->cidade;
        $estabelecimento->estado = $request->estado;
        $estabelecimento->telefone = $request->telefone;
        $estabelecimento->data_cadastro = $request->data_cadastro;
        $estabelecimento->status = $request->status;
        $estabelecimento->agencia = $request->agencia;
        $estabelecimento->conta = $request->conta;

        $estabelecimento->save();

        return $estabelecimento;
    }
    public function deletarEstabelecimento(EstabelecimentoIdRequest $request)
    {
        $estabelecimento = $this->estabelecimento->findOrFail($request->id);

        $estabelecimento->delete();
        return true;
    }


}
