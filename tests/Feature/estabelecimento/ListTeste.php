<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Estabelecimento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListTeste extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function listar_estabelecimentos()
    {
        //$response = $this->get('/listarEstabelecimentos');
        $estabelecimento = Categoria::factory()->create();
        var_dump($estabelecimento);
        return $estabelecimento->assertStatus(200);
    }

}
