<?php

namespace Tests\Feature\categoria;

use App\Models\Estabelecimentos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlterarEstabelecimentoTest extends TestCase
{
    /** @test */
    function atualizarEstabelecimento_ok(){
        $estabelecimento = Estabelecimentos::factory()->create();
        $estabelecimentoDiferente = Estabelecimentos::factory()->make();
        $estabelecimento->razao_social = $estabelecimentoDiferente->razao_social;

        $response = $this->put(route('atualizar.estabelecimento'), $estabelecimento->toArray());
        $response->assertStatus(200)->assertJsonStructure(['status','estabelecimento']);
    }
    /** @test */
    function atualizarEstabelecimento_semId(){
        $estabelecimento = Estabelecimentos::factory()->make();
        $estabelecimento->id_estabelecimento = '';
        $response = $this->put(route('atualizar.estabelecimento'), $estabelecimento->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /** @test */
    function atualizarEstabelecimento_semRazaoSocial(){
        $estabelecimento = Estabelecimentos::factory()->create(['razao_social' => '']);

        $response = $this->put(route('atualizar.estabelecimento'), $estabelecimento->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /** @test */
    function atualizarEstabelecimento_semCnpj(){
        $estabelecimento = Estabelecimentos::factory()->create(['cnpj' => '']);

        $response = $this->put(route('atualizar.estabelecimento'), $estabelecimento->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
}
