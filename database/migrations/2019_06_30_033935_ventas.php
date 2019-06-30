<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ventas extends Migration
{
    
    public function up()
    {
         Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id_venta');
            $table->date('fecha_venta');
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down()
    {
         Schema::drop('ventas');
    }
}
