<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('nombre',50);
            $table->string('app',50);
            $table->string('apm',50);
            $table->integer('edad');
            $table->string('direccion',100);
            $table->string('telefono',12);
            $table->string('email',50);
            $table->string('identificacion');
            $table->string('rfc',20);
            $table->string('razon_social',100);
            $table->string('com_dom');
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
        Schema::dropIfExists('clientes');
    }
}
