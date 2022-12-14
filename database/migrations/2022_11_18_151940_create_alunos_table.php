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
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('CEP', 8)->nullable();
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
