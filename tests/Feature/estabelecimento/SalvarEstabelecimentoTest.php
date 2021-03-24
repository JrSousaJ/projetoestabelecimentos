<?php

namespace Tests\Feature;

use App\Models\Estabelecimentos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SalvarEstabelecimentoTest extends TestCase
{
    /** @test */
    function salvarEstabelecimento_ok(){
        $estabelecimento = Estabelecimentos::factory()->make();
        $response = $this->post(route('salvar.estabelecimento'), $estabelecimento->toArray());

        $response->assertStatus(201)->assertJsonStructure(['status','id']);
    }
    /** @test */
    function salvarEstabelecimento_semRazaoSocial(){
        $estabelecimento = Estabelecimentos::factory()->make(['razao_social' => '']);

        $response = $this->post(route('salvar.estabelecimento'), $estabelecimento->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /** @test */
    function salvarEstabelecimento_mesmoRazaoSocial(){
        $estabelecimento = Estabelecimentos::factory()->create();
        $estabelecimentoRepetida = Estabelecimentos::factory()->make(['razao_social' => $estabelecimento->nome]);

        $response = $this->post(route('salvar.estabelecimento'), $estabelecimentoRepetida->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /** @test */
    function salvarEstabelecimento_semCnpj(){
        $estabelecimento = Estabelecimentos::factory()->make(['cnpj' => '']);

        $response = $this->post(route('salvar.estabelecimento'), $estabelecimento->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /** @test */
    function salvarEstabelecimento_mesmoCnpj(){
        $estabelecimento = Estabelecimentos::factory()->create();
        $estabelecimentoRepetida = Estabelecimentos::factory()->make(['cnpj' => $estabelecimento->nome]);

        $response = $this->post(route('salvar.estabelecimento'), $estabelecimentoRepetida->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
}
