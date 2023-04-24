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
        Schema::create('controle_dimensao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('dimensao_id');
            $table->unsignedBigInteger('periodo_avaliacao_id');
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->foreign('dimensao_id')->references('id')->on('dimensao');
            $table->foreign('periodo_avaliacao_id')->references('id')->on('periodo_avaliacao');
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
        Schema::dropIfExists('controle_dimensao');
    }
};
