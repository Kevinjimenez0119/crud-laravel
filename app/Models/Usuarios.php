<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Modelo Usuarios
class Usuarios extends Model
{
    protected $primaryKey = 'identificacion';

    protected $fillable = ['identificacion','nombres','apellidos','genero','ocupacion','email','password'];
}
