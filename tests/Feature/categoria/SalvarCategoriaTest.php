<?php

namespace Tests\Feature;

use App\Models\Categorias;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SalvarCategoriaTest extends TestCase
{
    /** @test */
    function salvarCategoria_ok(){
        $categoria = Categorias::factory()->make();

        $response = $this->post(route('salvar.categoria'), $categoria->toArray());

        $response->assertStatus(201)->assertJsonStructure(['status','id']);
    }
    /** @test */
    function salvarCategoria_semNome(){
        $categoria = Categorias::factory()->make(['nome' => '']);

        $response = $this->post(route('salvar.categoria'), $categoria->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /** @test */
    function salvarCategoria_mesmoNome(){
        $categoria = Categorias::factory()->create();
        $categoriaRepetida = Categorias::factory()->make(['nome' => $categoria->nome]);

        $response = $this->post(route('salvar.categoria'), $categoriaRepetida->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
}
