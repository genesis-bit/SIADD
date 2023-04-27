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
            $table->string('obs_validacao',100)->after('avaliador_id')->nullable();
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
            $table->dropColumn('obs_validacao');
        });
    }
};
