<?php

namespace Database\Seeders;

use App\Models\Estabelecimentos;
use Illuminate\Database\Seeder;

class EstabelecimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estabelecimentos::factory(10)->create();
    }
}
