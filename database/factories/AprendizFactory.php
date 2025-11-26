<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aprendiz>
 */
class AprendizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "name"=> $this->faker->name(),
            "documento"=>(string) $this->faker->unique()->numberify('##########'),
            "correo"=> $this->faker->unique()->safeEmail(),
            "ficha_id"=> $this->faker->optional()->numberBetween(100000, 999999),
        ];
    }
}
