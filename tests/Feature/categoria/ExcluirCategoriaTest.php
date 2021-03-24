<?php

namespace Tests\Feature\categoria;

use App\Models\Categorias;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExcluirCategoriaTest extends TestCase
{
    /**
        @test
    */
    public function excluirCategoria_ok()
    {
        $categoria = Categorias::factory()->create();

        $response = $this->json('DELETE', route('excluirPorId.categoria'), ['id' =>  $categoria->id]);

        $response->assertStatus(204);
    }
    /**
        @test
    */
    public function excluirCategoria_semId()
    {
        $categoria = Categorias::factory()->create();

        $response = $this->json('DELETE', route('excluirPorId.categoria'), ['id' =>  '']);

        $response->assertStatus(422)->assertJsonStructure(['status', 'error']);
    }
    /**
        @test
    */
    public function excluirCategoria_IdIncorreto()
    {
        $response = $this->json('DELETE', route('excluirPorId.categoria'), ['id' =>  100]);

        $response->assertStatus(410);
    }
}
