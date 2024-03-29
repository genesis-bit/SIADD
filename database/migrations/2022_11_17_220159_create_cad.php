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
        Schema::create('cad', function (Blueprint $table) {
            $table->id();
            $table->string('descricao',100)->unique();
            $table->unsignedBigInteger('periodo_avaliacao_id');
            $table->integer('ativo')->default(1);
            $table->foreign('periodo_avaliacao_id')->references('id')->on('periodo_avaliacao');
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
        Schema::dropIfExists('cad');
    }
};
