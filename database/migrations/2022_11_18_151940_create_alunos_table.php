<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('CPF')->unique();
            $table->string('endereco');
            $table->string('complemento');
            $table->string('cidade');
            $table->string('estado');
            $table->string('CEP', 8);
            $table->string('filme')->nullable();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->timestampTz('ultimoAcesso')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
