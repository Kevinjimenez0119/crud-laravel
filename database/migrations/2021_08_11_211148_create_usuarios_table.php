<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Migracion a la base de datos, Tabla:usuarios, Modelo: Usuarios
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('identificacion');
            $table->timestamps();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('genero');
            $table->string('ocupacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
