<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechayterminado2ToNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas', function (Blueprint $table) {
            //
            $table->dateTime('fecha')->nulleabe();
            $table->boolean('terminado')->nulleabe();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas', function (Blueprint $table) {
            //
            $table->dateTime('fecha')->nulleabe();
            $table->boolean('terminado')->nulleabe();
        });
    }
}
