<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class TestDB extends BaseController
{
    public function index()
    {
        try {
            $db = Database::connect();
            if ($db) {
                echo "✅ Conexión exitosa a la base de datos.";
            } else {
                echo "❌ Falló la conexión.";
            }
        } catch (\Throwable $e) {
            echo "❌ Error de conexión: " . $e->getMessage();
        }
    }
}
