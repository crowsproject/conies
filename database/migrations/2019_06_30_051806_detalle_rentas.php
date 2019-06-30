<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleRentas extends Migration
{
    
    public function up()
    {
         Schema::create('detalle_rentas', function (Blueprint $table) {
            $table->bigIncrements('id_detalle_renta');
            $table->decimal('costo_total',8,2);
			$table->date('fecha_salida');
			$table->date('fecha_entrada');
			$table->string('observaciones',150);
			$table->integer('id_renta')->unsigned();
			$table->integer('id_herramienta')->unsigned();
            $table->foreign('id_renta')->references('id_renta')->on('rentas')->onDelete('cascade');
            $table->foreign('id_herramienta')->references('id_herramienta')->on('herramientas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

   
    public function down()
    {
        Schema::drop('detalle_rentas');
    }
}
