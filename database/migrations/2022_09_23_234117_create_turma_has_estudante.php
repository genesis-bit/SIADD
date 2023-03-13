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
        Schema::create('turma_has_estudante', function (Blueprint $table) {
            $table->unsignedBigInteger('turma_id');
            $table->unsignedBigInteger('estudante_id');
            $table->foreign('turma_id')->references('id')->on('turma_has_curso');
            $table->foreign('estudante_id')->references('id')->on('estudante');
            $table->primary(['turma_id', 'estudante_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_has_estudante');
    }
};
