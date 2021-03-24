<?php

namespace Tests\Feature\categoria;

use App\Models\Categorias;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlterarCategoriaTest extends TestCase
{
    /** @test */
    function atualizarCategoria_ok(){
        $categoria = Categorias::factory()->create();
        $categoriaDiferente = Categorias::factory()->make();
        $categoria->nome = $categoriaDiferente->nome;
        $response = $this->put(route('atualizar.categoria'), $categoria->toArray());

        $response->assertStatus(200)->assertJsonStructure(['status','categoria']);
    }
    /** @test */
    function atualizarCategoria_semId(){
        $categoria = Categorias::factory()->make();

        $response = $this->put(route('atualizar.categoria'), $categoria->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
    /** @test */
    function atualizarCategoria_semNome(){
        $categoria = Categorias::factory()->create();

        $response = $this->put(route('atualizar.categoria'), $categoria->toArray());

        $response->assertStatus(422)->assertJsonStructure(['status','error']);
    }
}
