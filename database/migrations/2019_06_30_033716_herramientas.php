<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Herramientas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->increments('id_herramienta');
            $table->string('nombre_herramienta',50);
            $table->date('fecha_compra');
            $table->decimal('costo',8,2);
            $table->string('especificaciones');
            $table->string('serial',50);
            $table->integer('id_tipo_herramienta')->unsigned();
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_tipo_herramienta')->references('id_tipo_herramienta')->on('tipo_herramientas')->onDelete('cascade');
            $table->foreign('id_marca')->references('id_marca')->on('marcas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('herramientas');
    }
}
