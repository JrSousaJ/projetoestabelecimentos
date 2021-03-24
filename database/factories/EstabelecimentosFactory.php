<?php

namespace Database\Factories;

use App\Models\Estabelecimentos;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstabelecimentosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estabelecimentos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'razao_social' => $this->faker->company,
            'nome_fantasia' => $this->faker->company,
            'cnpj' => $this->faker->regexify('^\d{2}.?\d{3}.?\d{3}/?\d{4}-?\d{2}'),
            'email' => $this->faker->companyEmail,
            'endereco' => $this->faker->streetAddress,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->state,
            'telefone' => $this->faker->phoneNumber,
            'data_cadastro' => date("Y-m-d"),
            'status' => 1,
            'categoria_id' => 1,
            'agencia' => $this->faker->regexify('[0-9]{3}-[0-9]{1}'),
            'conta' => $this->faker->regexify('[0-9]{5}-[0-9]{1}')
        ];
    }
}
