<?php

namespace Tests\Feature;

use App\Models\Categorias;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuscaCategoriaPorIdTest extends TestCase
{
    /**
        @test
    */
    public function buscarCategoria_Ok_Id()
    {
        $categoria = Categorias::factory()->create();

        $response = $this->json('GET', route('buscaPorId.categoria'), ['id' =>  $categoria->id]);

        $response->assertStatus(200)->assertJsonStructure(['status','categoria']);
    }
    /**
        @test
    */
    public function buscarCategoria_Sem_Id()
    {
        Categorias::factory()->create();

        $response = $this->json('GET', route('buscaPorId.categoria'), ['id' =>  '']);

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /**
        @test
    */
    public function buscarCategoria_Id_Invalido()
    {
        $response = $this->json('GET', route('buscaPorId.categoria'), ['id' =>  100]);

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
}
