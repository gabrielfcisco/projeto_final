<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'CPF' => fake()->unique()->numerify('###########'),
            'ultimoAcesso' => now(),
            'endereco' => fake()->address(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
