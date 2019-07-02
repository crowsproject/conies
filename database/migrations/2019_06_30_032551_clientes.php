<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    
    public function up()
    {
         Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('nombre_cliente',50);
            $table->string('apellido_paterno_cliente',50);
            $table->string('apellido_materno_cliente',50);
            $table->integer('edad');
            $table->string('direccion',100);
            $table->string('telefono',12);
            $table->string('email',50);
            $table->string('identificacion');
            $table->string('rfc',20);
            $table->string('razon_social',100);
            $table->string('comprobante_domiciliario');
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
         Schema::drop('clientes');
    }
}
