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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricaoCompleta');
            $table->tinyText('descricaoCurta');
            $table->integer('matriculas')->default(0);
            $table->integer('max');
            $table->integer('min');
            $table->foreignId('professor_id')
                ->nullable()
                ->constrained('professores')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('file_path')->nullable();
            $table->boolean('aberto_matricula')->default(0);
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
        Schema::dropIfExists('cursos');
    }
};
