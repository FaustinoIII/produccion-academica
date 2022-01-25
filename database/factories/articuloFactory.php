<?php

namespace Database\Factories;

use App\Models\articulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class articuloFactory extends Factory
{
    protected $model = articulo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'revista' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'abstract' => $this->faker->paragraph(),
            'autores' => $this->faker->numberBetween(1, 10),
            'url' => $this->faker->url(),
            'pdf' => $this->faker->imageUrl($width = 640, $height = 480, 'cats'),
            'tipo' => $this->faker->randomElement(['1','2','3','4']), 
        ];
    }
}
