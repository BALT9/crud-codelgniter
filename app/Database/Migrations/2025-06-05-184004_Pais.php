<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pais extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'codigo_pais' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'nombre_pais' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'codigo_continente' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

        ]);

        $this->forge->addKey('codigo_pais',true);
        $this->forge->addForeignKey('codigo_continente','continente','codigo_continente', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pais');
    }

    public function down()
    {
        $this->forge->dropTable('pais');
    }
}
