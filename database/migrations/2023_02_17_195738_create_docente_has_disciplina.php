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
        Schema::create('docente_has_disciplina', function (Blueprint $table) {
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('dis_id');            
            $table->foreign('dis_id')->references('id')->on('disciplina');
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->primary(['docente_id','dis_id']);
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
        Schema::dropIfExists('docente_has_disciplina');
    }
};
