<?php

namespace Tests\Feature;

use App\Models\Estabelecimentos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuscaEstabelecimentoPorIdTest extends TestCase
{
    /**
        @test
    */
    public function buscarEstabelecimento_Ok_Id()
    {
        $estabelecimento = Estabelecimentos::factory()->create();
        $response = $this->json('GET', route('buscaPorId.estabelecimento'), ['id' =>  $estabelecimento->id_estabelecimento]);

        $response->assertStatus(200)->assertJsonStructure(['status','estabelecimento']);
    }
    /**
        @test
    */
    public function buscarEstabelecimento_Sem_Id()
    {
        $response = $this->json('GET', route('buscaPorId.estabelecimento'), ['id' =>  '']);

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /**
        @test
    */
    public function buscarEstabelecimento_Id_Invalido()
    {
        $response = $this->json('GET', route('buscaPorId.estabelecimento'), ['id' =>  100]);

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
}
