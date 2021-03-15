<?php

namespace Database\Factories;

use App\Models\Estabelecimento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstabelecimentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estabelecimento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle,

        ];
    }
}
