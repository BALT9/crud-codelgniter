<?php

namespace App\Models;

use CodeIgniter\Model;

class Continente extends Model
{
    // nombre de la tabla 
    protected $table = 'continente';

    // clave primaria 
    protected $primaryKey = 'codigo_continente';

    // Campos permitidos para inserción/actualización
    protected $allowedFields = ['nombre_continente'];
}
