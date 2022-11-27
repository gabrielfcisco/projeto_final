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
                'email' => 'joao@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 0,
            ],
            [
                'email' => 'guilherme@exemple.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'type' => 0,
            ],
            [
                'email' => 'secretaria@sec.com',
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

        \App\Models\User::factory(10)->create();

        $professores = [

            [
                'nome' => 'Leandro Alonso Xastre',
                'CPF' => '12345678912',
                'endereco' => 'Rua dos bobos',
                'complemento' => 'Casa 0',
                'cidade' =>'Campinas',
                'estado' =>'Sao Paulo',
                'CEP' => '12345678',
                'user_id' => '1',
            ],
            [
                'nome' => 'Valdomiro Placido dos Santos',
                'CPF' => '12345678912',
                'endereco' => 'Rua dos matematicos',
                'complemento' => 'Casa 12',
                'cidade' =>'Campinas',
                'estado' =>'Sao Paulo',
                'CEP' => '87654321',
                'user_id' => '2',
            ],
            [
                'nome' => 'Ricardo Pannain',
                'CPF' => '12345678912',
                'endereco' => 'Rua dos loucos',
                'complemento' => 'Casa 88',
                'cidade' =>'Campinas',
                'estado' =>'Sao Paulo',
                'CEP' => '12387654',
                'user_id' => '3',
            ],
        ];

        foreach ($professores as $key => $user) {
            Professor::create($user);
        }
        
        $cursos = [
            [
                'nome' => 'Engenharia de Computação',
                'descricaoCompleta' => 'Curso que engloba todas as areas da computação, desde a parte fisica(hardware) como a digital(software).',
                'descricaoCurta' => 'Gostar de tecnologia e inovação são as caracteristicas principais para os ingressantes deste curso.',
                'matriculas' => 0,
                'max' => 30,
                'min' =>  10,
                'aberto_matricula' => true,
                'professor_id' =>'1',
            ],
            [
                'nome' => 'Engenharia Civil',
                'descricaoCompleta' => 'Desenvolver projetos de engenharia, executar obras, planejar, coordenar a operação e manutenção são algumas das competencias desenvolvidas neste curso.',
                'descricaoCurta' => 'A mais antiga engenharia.',
                'matriculas' => 0,
                'max' => 30,
                'min' =>  10,
                'professor_id' =>'2',
            ],
            [
                'nome' => 'Engenharia de Química',
                'descricaoCompleta' => 'O engenheiro químico busca transformar a matéria prima em produtos uteis para o consumidor final.',
                'descricaoCurta' => 'É o ramo da engenharia que trata de processos químicos.',
                'matriculas' => 0,
                'max' => 30,
                'min' =>  10,
                'aberto_matricula' => true,
                'professor_id' =>'3',
            ],
        ];

        foreach ($cursos as $key => $user) {
            Curso::create($user);
        }

        $alunos = [
            [
                'nome' => 'Eduardo',
                'CPF' => '12345678912',
                'endereco' => 'Rua dos bobos',
                'complemento' => 'Casa 13',
                'cidade' =>'Campinas',
                'estado' =>'Sao Paulo',
                'CEP' => '87612354',
                'user_id' => '4',
            ],
            [
                'nome' => 'Joao',
                'CPF' => '98765432198',
                'endereco' => 'Rua dos existentes',
                'complemento' => 'Casa 1',
                'cidade' =>'Campinas',
                'estado' =>'Sao Paulo',
                'CEP' => '55566677',
                'user_id' => '5',
            ],
            [
                'nome' => 'Guilherme',
                'CPF' => '45678912345',
                'endereco' => 'Rua dos existentes',
                'complemento' => 'Casa 2',
                'cidade' =>'Campinas',
                'estado' =>'Sao Paulo',
                'CEP' => '55566677',
                'user_id' => '6',
            ],
        ];

        foreach ($alunos as $key => $aluno) {
            Aluno::create($aluno);
        }
    }
}
