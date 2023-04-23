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
        Schema::table('avaliacao_has_docente', function (Blueprint $table) {
            $table->unsignedBigInteger('avaliador_id')->after('estado_resposta_id')->nullable();
            $table->foreign('avaliador_id')->references('avaliador_id')->on('avaliador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avaliacao_has_docente', function (Blueprint $table) {
           $table->dropForeign('avaliador_id');
            $table->dropColumn('avaliador_id');
        });
    }
};
