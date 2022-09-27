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
        Schema::create('tb_curso', function (Blueprint $table) {
            $table->id();
            $table->string('descricao',30);
            $table->unsignedBigInteger('ano_lectivo_id');
            $table->foreign('ano_lectivo_id')->references('id')->on('tb_ano_lectivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_curso');
    }
};
