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
        Schema::create('turma_has_curso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turma_id');            
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('ano_lectivo_id');
            $table->unsignedBigInteger('ano_academico_id');
            $table->unsignedBigInteger('semestre_id');
            $table->foreign('ano_academico_id')->references('id')->on('ano_academico');
            $table->foreign('semestre_id')->references('id')->on('semestre');
            $table->foreign('ano_lectivo_id')->references('id')->on('ano_lectivo');
            $table->foreign('curso_id')->references('id')->on('curso');
            $table->foreign('turma_id')->references('id')->on('turma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_has_curso');
    }
};
