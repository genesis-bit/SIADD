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
        Schema::create('tb_professor', function (Blueprint $table) {
            $table->id();
            $table->String('nome_professor', 45);
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('unidade_organica_id');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('unidade_organica_id')->references('id')->on('tb_unidade_organica');
            $table->foreign('departamento_id')->references('id')->on('tb_departamento');
            $table->foreign('categoria_id')->references('id')->on('tb_categoria');
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
        Schema::dropIfExists('tb_professor');
    }
};
