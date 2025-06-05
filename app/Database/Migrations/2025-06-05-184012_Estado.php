<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estado extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'codigo_estado' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre_estado' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'codigo_continente' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'codigo_pais' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('codigo_estado', true);
        $this->forge->addForeignKey('codigo_continente', 'continente', 'codigo_continente', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('codigo_pais', 'pais', 'codigo_pais', 'CASCADE', 'CASCADE');
        $this->forge->createTable('estado');
    }

    public function down()
    {
        $this->forge->dropTable('estado');
    }
}
