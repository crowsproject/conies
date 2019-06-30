<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('id_detalle_venta');
            $table->decimal('costo_total',8,2);
            $table->integer('id_venta')->unsigned();
            $table->integer('id_herramienta')->unsigned();
            $table->foreign('id_venta')->references('id_venta')->on('ventas')->onDelete('cascade');
            $table->foreign('id_herramienta')->references('id_herramienta')->on('herramientas')->onDelete('cascade');
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
        Schema::drop('detalle_ventas');
    }
}
