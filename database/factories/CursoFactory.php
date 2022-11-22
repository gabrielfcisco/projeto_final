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
            'descricao_curta' => fake()->text($maxNbChars = 25) ,
            'descricao_completa' => fake()->text($maxNbChars = 200),
            'min' => 10,
            'max' => 50,
        ];
    }
}
