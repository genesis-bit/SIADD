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
        Schema::create('turma_has_docente', function (Blueprint $table) {
            $table->unsignedBigInteger('turma_id');
            $table->unsignedBigInteger('docente_id');
            $table->foreign('turma_id')->references('id')->on('turma');
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->primary(['turma_id', 'docente_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_has_docente');
    }
};
