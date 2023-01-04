<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Difregister extends Model
{
    use Searchable;
    protected $fillable=['Nombre', 'Curp', 'Genero', 'NoDeHijos', 'Discap', 'Nomdiscap', 'Ing_Men', 'Nom_Apoyo', 'Status'];
}
