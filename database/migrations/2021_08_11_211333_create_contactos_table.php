<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Migracion a la base de datos, Tabla:contactos, Modelo: Contactos
        Schema::create('contactos', function (Blueprint $table) {
            $table->bigIncrements('id_contacto');
            $table->timestamps();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('recidencia');
            $table->unsignedBigInteger('id_usuario');

            $table->foreign('id_usuario')
            ->references('id')
            ->on('usuarios')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactos');
    }
}
