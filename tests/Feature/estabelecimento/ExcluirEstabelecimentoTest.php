<?php

namespace Tests\Feature\categoria;

use App\Models\Estabelecimentos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExcluirEstabelecimentoTest extends TestCase
{
    /**
        @test
    */
    public function excluirEstabelecimento_ok()
    {
        $estabelecimento = Estabelecimentos::factory()->create();

        $response = $this->json('DELETE', route('excluirPorId.estabelecimento'), ['id' =>  $estabelecimento->id_estabelecimento]);

        $response->assertStatus(204);
    }
    /**
        @test
    */
    public function excluirEstabelecimento_semId()
    {
        $response = $this->json('DELETE', route('excluirPorId.estabelecimento'), ['id' =>  '']);

        $response->assertStatus(422)->assertJsonStructure(['status', 'error']);
    }
    /**
        @test
    */
    public function excluirEstabelecimento_IdIncorreto()
    {
        $response = $this->json('DELETE', route('excluirPorId.estabelecimento'), ['id' =>  100]);

        $response->assertStatus(410);
    }
}
