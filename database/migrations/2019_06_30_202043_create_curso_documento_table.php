<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_documento', function (Blueprint $table) {
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('documento_id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->primary(['curso_id', 'documento_id']);

            $table->foreign('curso_id')
                  ->references('id')
                  ->on('cursos')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('documento_id')
                  ->references('id')
                  ->on('documentos')
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
        Schema::dropIfExists('curso_documento');
    }
}
