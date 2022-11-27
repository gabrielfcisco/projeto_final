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
                'email' => 'Xastre@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 1,
            ],
            [
                'email' => 'Miro@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 1,
            ],
            [
                'email' => 'Pannain@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 1,
            ],
            [
                'email' => 'eduardo@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 0,
            ],
            [
                'email' => 'aluno@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 0,
            ],
            [
                'email' => 'secretaria@adm.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 2,
            ],
            [
                'email' => 'admin@adm.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 3,
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }

        // \App\Models\User::factory(10)->create();


        // Aluno::factory(10)->create();

        $cursos = [
            [
                'nome' => 'Engenharia de Computação',
                'descricaoCompleta' => 'Quod illum sed mollitia tempora cupiditate. Non quia alias quo ducimus maiores ullam.',
                'descricaoCurta' => 'ghjahglahglçfhaglçahgfhgahglfahglfhlgalhgljfhg',
                'matriculas' => 0,
                'max' => 30,
                'min' =>  10,
                'aberto_matricula' => true,
            ],
            [
                'nome' => 'Engenharia Civil',
                'descricaoCompleta' => 'Quod illum sed mollitia tempora cupiditate. Non quia alias quo ducimus maiores ullam.',
                'descricaoCurta' => 'ghjahglahglçfhaglçahgfhgahglfahglfhlgalhgljfhg',
                'matriculas' => 0,
                'max' => 30,
                'min' =>  10,
            ],
            [
                'nome' => 'Engenharia de Química',
                'descricaoCompleta' => 'Quod illum sed mollitia tempora cupiditate. Non quia alias quo ducimus maiores ullam.',
                'descricaoCurta' => 'ghjahglahglçfhaglçahgfhgahglfahglfhlgalhgljfhg',
                'matriculas' => 0,
                'max' => 30,
                'min' =>  10,
                'aberto_matricula' => true,
            ],
        ];

        foreach ($cursos as $key => $user) {
            Curso::create($user);
        }

        // foreach ($cursos as $key => $user) {
        //     Curso::create($user);
        // }

        $professores = [
            [
                'nome' => 'Xastre',
                'CPF' => '45863257852',
                'user_id' => '1',
            ],
            [
                'nome' => 'Miro',
                'CPF' => '97854123658',
                'user_id' => '2',
            ],
            [
                'nome' => 'Pannain',
                'CPF' => '45321578965',
                'user_id' => '3',
            ],
        ];

        foreach ($professores as $key => $user) {
            Professor::create($user);
        }

        $alunos = [
            [
                'nome' => 'Eduardo',
                'CPF' => '12345678910',
                'endereco' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ',
                'user_id' => '4',
            ],
            [
                'nome' => 'Aluno',
                'CPF' => '01987654321',
                'endereco' => 'Vestibulum nulla maximus quis. Aenean semper congue',
                'user_id' => '5',
            ],
        ];

        foreach ($alunos as $key => $aluno) {
            Aluno::create($aluno);
        }
    }
}
