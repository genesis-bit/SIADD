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
        Schema::create('tb_ano_academico', function (Blueprint $table) {
            $table->id();
            $table->String('descricao',30);
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('tb_curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ano_academico');
    }
};
