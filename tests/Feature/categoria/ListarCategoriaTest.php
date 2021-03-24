<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListarCategoriaTest extends TestCase
{
    /**
        @test
    */
    public function test_listarCategorias()
    {
        $response = $this->get(route('lista.categoria'));

        $response->assertStatus(200)->assertJsonStructure(['status','categoria']);
    }
}
