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
        Schema::create('estudante_avalia_docente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudante_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('periodo_avaliacao_id');
            $table->unsignedBigInteger('indicador_id');
            $table->integer('escala');
            $table->foreign('estudante_id')->references('id')->on('estudante');
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->foreign('periodo_avaliacao_id')->references('id')->on('periodo_avaliacao');
            $table->foreign('indicador_id')->references('id')->on('indicador_estudante');
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
        Schema::dropIfExists('estudante_avalia_docente');
    }
};
