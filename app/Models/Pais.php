<?php

namespace App\Models;

use CodeIgniter\Model;

class Pais extends Model
{
    // Nombre de la tabla 
    protected $table = 'pais';

    // Clave primaria 
    protected $primaryKey = 'codigo_pais';

    // Campos permitidos para inserción/actualización
    protected $allowedFields = ['nombre_pais', 'codigo_continente'];
}
