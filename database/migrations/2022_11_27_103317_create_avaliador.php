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
        Schema::create('avaliador', function (Blueprint $table) {
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('avaliador1_id');
            $table->unsignedBigInteger('avaliador2_id');
            $table->primary(['docente_id','avaliador1_id','avaliador2_id']);
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->foreign('avaliador1_id')->references('docente_id')->on('cad_has_docente');
            $table->foreign('avaliador2_id')->references('docente_id')->on('cad_has_docente');
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
        Schema::dropIfExists('avaliador');
    }
};
