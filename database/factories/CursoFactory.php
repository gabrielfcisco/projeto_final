<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => 'Matéria',
            'descricaoCurta' => fake()->text($maxNbChars = 25) ,
            'descricaoCompleta' => fake()->text($maxNbChars = 200),
            'min' => 10,
            'max' => 50,
        ];
    }
}
