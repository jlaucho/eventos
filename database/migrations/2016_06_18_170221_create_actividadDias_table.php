<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evento_id')->unsigned();
            $table->date('fecha');
            $table->longText('actividades');
             $table->foreign('evento_id')
                ->references('id')
                ->on('eventos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::drop('actividades_eventos');
    }
}
