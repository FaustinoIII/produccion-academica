<?php

namespace Database\Factories;

use App\Models\autores;
use Illuminate\Database\Eloquent\Factories\Factory;

class autoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'autor1' => $this->faker->name(),
            'autor2' => $this->faker->name(),
            'autor3' => $this->faker->name(),
            'autor4' => $this->faker->name(),
        ];
    }
}
