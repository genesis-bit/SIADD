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
            $table->unsignedBigInteger('avaliador_id');
            $table->unsignedBigInteger('cad_id');
            $table->primary(['docente_id','avaliador_id','cad_id']);
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->foreign('avaliador_id')->references('docente_id')->on('cad_has_docente');
            $table->foreign('cad_id')->references('id')->on('cad');
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
