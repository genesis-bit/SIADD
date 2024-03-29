<?php

use App\Models\Avaliacao;
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
        Schema::create('avaliacao_has_docente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('periodo_avaliacao_id');
            $table->unsignedBigInteger('indicador_id');
            $table->text('documento_comprovante')->nullable();
            $table->text('resposta');  
            $table->unsignedBigInteger('estado_resposta_id')->default(1);    
            $table->unsignedBigInteger('avaliador_id')->nullable();      
            $table->foreign('docente_id')->references('id')->on('docente');
            $table->foreign('periodo_avaliacao_id')->references('id')->on('periodo_avaliacao');
            $table->foreign('indicador_id')->references('id')->on('indicador');
            $table->foreign('estado_resposta_id')->references('id')->on('estado_resposta');            
            $table->foreign('avaliador_id')->references('avaliador_id')->on('avaliador');
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
        Schema::dropIfExists('avaliacao_has_docente');
    }
};
