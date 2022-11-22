<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Aluno::factory(10)->create();

        $cursos = [
            [
               'nome'=>'Engenharia de Computação',
               'descricao_completa'=>'Quod illum sed mollitia tempora cupiditate. Non quia alias quo ducimus maiores ullam.',
               'descricao_curta' => 'ghjahglahglçfhaglçahgfhgahglfahglfhlgalhgljfhg',
               'matriculas' => 0,
               'max'=> 30,
               'min' =>  10,
            ],
            [
                'nome'=>'Engenharia Civil',
                'descricao_completa'=>'Quod illum sed mollitia tempora cupiditate. Non quia alias quo ducimus maiores ullam.',
                'descricao_curta' => 'ghjahglahglçfhaglçahgfhgahglfahglfhlgalhgljfhg',
                'matriculas' => 0,
                'max'=> 30,
                'min' =>  10,
            ],
            [
                'nome'=>'Engenharia de Química',
                'descricao_completa'=>'Quod illum sed mollitia tempora cupiditate. Non quia alias quo ducimus maiores ullam.',
                'descricao_curta' => 'ghjahglahglçfhaglçahgfhgahglfahglfhlgalhgljfhg',
                'matriculas' => 0,
                'max'=> 30,
                'min' =>  10,
            ],
        ];

        foreach ($cursos as $key => $user) {
            Curso::create($user);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
