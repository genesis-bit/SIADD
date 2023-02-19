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
        Schema::create('cad_has_docente', function (Blueprint $table) {
            $table->unsignedBigInteger('cad_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('estado_cad_id');
            $table->foreign('cad_id')->references('id')->on('cad');
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->foreign('estado_cad_id')->references('id')->on('estado_cad');
            $table->primary(['cad_id', 'docente_id']);
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
        Schema::dropIfExists('cad_has_docente');
    }
};
