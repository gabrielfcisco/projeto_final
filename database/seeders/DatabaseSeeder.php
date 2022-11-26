<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professor;
use App\Models\User;
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
        $users = [
            [
                'email'=>'Xastre@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 1,
            ],
            [
                'email'=>'Miro@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 1,
            ],
            [
                'email'=>'Pannain@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 1,
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }

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

        $professores = [
            [
               'nome'=>'Xastre',
               'CPF'=> '45863257852',
            ],
            [
                'nome'=>'Miro',
                'CPF'=> '97854123658',
            ],
            [
                'nome'=>'Pannain',
                'CPF'=> '45321578965',
            ],
        ];

        foreach ($professores as $key => $user) {
            Professor::create($user);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
