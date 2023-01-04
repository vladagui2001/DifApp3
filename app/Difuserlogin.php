<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Difuserlogin extends Model
{
    protected $fillable=['Nombre', 'Username','Curp','FechaNac','Genero','Avatar', 'Password'];
}
