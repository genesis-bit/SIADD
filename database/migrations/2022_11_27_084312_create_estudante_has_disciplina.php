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
        Schema::create('estudante_has_disciplina', function (Blueprint $table) {
            $table->unsignedBigInteger('estudante_id');
            $table->unsignedBigInteger('dis_id');            
            $table->foreign('dis_id')->references('id')->on('disciplina');
            $table->foreign('estudante_id')->references('id')->on('estudante');
            $table->primary(['estudante_id','dis_id']);
            //dis_id = representa o id da tabela disciplina, adaptei para o laravel conseguir colocar como chave estrangeira
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
        Schema::dropIfExists('estudante_has_disciplina');
    }
};
