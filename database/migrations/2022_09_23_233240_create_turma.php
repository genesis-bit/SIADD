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
        Schema::create('turma', function (Blueprint $table) {
            $table->id();
            $table->string('descricao',30);
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('ano_lectivo_id');
            $table->unsignedBigInteger('ano_academico_id');
            $table->unsignedBigInteger('semestre_id');
            $table->foreign('ano_academico_id')->references('id')->on('ano_academico');
            $table->foreign('semestre_id')->references('id')->on('semestre');
            $table->foreign('ano_lectivo_id')->references('id')->on('ano_lectivo');
            $table->foreign('curso_id')->references('id')->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma');
    }
};
