<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Modelo Contactos
class Contactos extends Model
{
    protected $fillable = ['telefono', 'direccion', 'ciudad', 'recidencia', 'id_usuario'];
}
