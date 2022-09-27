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
        Schema::create('tb_categoria', function (Blueprint $table) {
            $table->id();
            $table->String('descricao',30);
            $table->unsignedBigInteger('grau_academico_id');
            $table->foreign('grau_academico_id')->references('id')->on('tb_grau_academico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_categoria');
    }
};
