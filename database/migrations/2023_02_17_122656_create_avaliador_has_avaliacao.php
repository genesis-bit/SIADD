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
        Schema::create('avaliador_has_avaliacao', function (Blueprint $table) {
            $table->unsignedBigInteger('avaliador_id');
            $table->unsignedBigInteger('avaliacao_id');
            $table->unsignedBigInteger('estado_resposta_id');  
            $table->primary(['avaliador_id','avaliacao_id']);
            $table->foreign('avaliador_id')->references('avaliador_id')->on('avaliador');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacao_has_docente');
            $table->foreign('estado_resposta_id')->references('id')->on('estado_resposta');
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
        Schema::dropIfExists('avaliador_has_avaliacao');
    }
};
