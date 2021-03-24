<?php

namespace Tests\Feature;

use App\Models\Estabelecimentos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListarEstabelecimentoTest extends TestCase
{
    /**
        @test
    */
    public function test_listarEstabelecimento()
    {
        Estabelecimentos::factory(10)->make();
        $response = $this->get(route('lista.estabelecimento'));

        $response->assertStatus(200)->assertJsonStructure(['status','estabelecimento']);
    }
}
