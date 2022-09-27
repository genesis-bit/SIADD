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
        Schema::create('tb_turma', function (Blueprint $table) {
            $table->id();
            $table->string('descricao',30);
            $table->unsignedBigInteger('ano_academico_id');
            $table->unsignedBigInteger('semestre_id');
            $table->foreign('ano_academico_id')->references('id')->on('tb_ano_academico');
            $table->foreign('semestre_id')->references('id')->on('tb_semestre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_turma');
    }
};
