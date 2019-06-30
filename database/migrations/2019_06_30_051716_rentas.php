<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rentas extends Migration
{
    
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->increments('id_renta');
            $table->date('fecha_renta');
			$table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
			$table->integer('id_conductor')->unsigned();
            $table->foreign('id_conductor')->references('id_conductor')->on('conductores')->onDelete('cascade');
			$table->integer('id_forma_pago')->unsigned();
            $table->foreign('id_forma_pago')->references('id_forma_pago')->on('forma_pagos')->onDelete('cascade');
            $table->timestamps();
			$table->softDeletes();  
        });
    }

    
    public function down()
    {
        Schema::drop('rentas');
    }
}
