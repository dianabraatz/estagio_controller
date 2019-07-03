<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoDocumentoEstagioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_documento_estagio', function (Blueprint $table) {
            $table->unsignedBigInteger('curso_documento_id');
            $table->unsignedBigInteger('estagio_id');

            $table->primary(['curso_documento_id', 'estagio_id']);

            $table->foreign('curso_documento_id')
                  ->references('id')
                  ->on('curso_documento')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('estagio_id')
                  ->references('id')
                  ->on('estagios')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_estagio');
    }
}
