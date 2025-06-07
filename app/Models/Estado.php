<?php

namespace App\Models;

use CodeIgniter\Model;

class Estado extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'codigo_estado';
    
    // Asegúrate de incluir todos los campos que vas a guardar
    protected $allowedFields = ['nombre_estado', 'codigo_pais', 'codigo_continente'];
}
