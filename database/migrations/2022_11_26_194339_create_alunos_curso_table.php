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
        Schema::create('aluno_curso', function (Blueprint $table) {
            $table->primary(['aluno_id', 'curso_id']);
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
                $table->foreignId('curso_id')
                    ->constrained('cursos')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->float('nota')->default(0.00);
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
        Schema::dropIfExists('alunos_curso');

        Schema::table('cursos', function (Blueprint $table)
        {
            $table->dropForeign('aluno_curso_curso_id_foreign');
            $table->dropColumn('cursos_id');
        });
    }
};
