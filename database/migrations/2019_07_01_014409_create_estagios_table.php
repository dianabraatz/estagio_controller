<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstagiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estagios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_inicio');
            $table->date('data_termino')->nullable();
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('professor_id');
            $table->timestamps();

            $table->foreign('aluno_id')
                  ->references('id')
                  ->on('alunos');

            $table->foreign('empresa_id')
                  ->references('id')
                  ->on('empresas');

            $table->foreign('professor_id')
                  ->references('id')
                  ->on('professores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estagios');
    }
}
