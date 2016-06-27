<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_inventario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evento_id')->unsigned();
            $table->integer('inventario_id')->unsigned();
            $table->foreign('evento_id')
                ->references('id')
                ->on('eventos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('inventario_id')
                ->references('id')
                ->on('inventario')
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
        Schema::drop('evento_inventario');
    }
}
