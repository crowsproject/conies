<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->increments('id_h');
            $table->string('nombre',50);
            $table->date('fecha_compra');
            $table->decimal('costo',8,2);
            $table->string('especificaciones');
            $table->string('serial',50);
            $table->integer('id_th')->unsigned();
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_th')->references('id_th')->on('tipo_herramientas')->onDelete('cascade');
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
        Schema::dropIfExists('herramientas');
    }
}
