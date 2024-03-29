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
        Schema::create('docente', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->String('nome_docente', 100);
            $table->string('numero_mecanografico',50)->unique();
            $table->unsignedBigInteger('unidade_organica_id');
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('grau_academico_id');
            $table->unsignedBigInteger('categoria_profissional_id');
            $table->unsignedBigInteger('percentagem_contratacao_id');
            $table->primary('id');
            $table->foreign('id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('unidade_organica_id')->references('id')->on('unidade_organica')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamento')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('categoria_profissional_id')->references('id')->on('categoria_profissional')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('grau_academico_id')->references('id')->on('grau_academico')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('percentagem_contratacao_id')->references('id')->on('percentagem_contratacao')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cargo_id')->references('id')->on('cargo')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('docente');
    }
};
