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
        Schema::create('tb_disciplina', function (Blueprint $table) {
            $table->id();
            $table->string('descricao',30);
            $table->unsignedBigInteger('professor_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->foreign('professor_id')->references('id')->on('tb_professor');
            $table->foreign('disciplina_id')->references('id')->on('tb_disciplina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_disciplina');
    }
};
