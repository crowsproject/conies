<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Conductores extends Migration
{
    
    public function up()
    {
         Schema::create('conductores', function (Blueprint $table) {
            $table->increments('id_conductor');
            $table->string('nombre_conductores',50);
            $table->string('apellido_paterno_conductores',50);
            $table->string('apellido_materno_conductores',50);
            $table->integer('edad');
            $table->string('direccion',100);
            $table->string('telefono',12);
            $table->string('email',50);
            $table->string('identificacion');
            $table->string('rfc',20);
            $table->string('razon_social',100);
			$table->string('licencia_conduccion',100);
            $table->timestamps();
            $table->softDeletes();            
        });
    }

    
    public function down()
    {
          Schema::drop('conductores');
    }
}
