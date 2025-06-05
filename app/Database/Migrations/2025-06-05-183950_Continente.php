<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Continente extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'codigo_continente'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'nombre_continente' =>[
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],

        ]);

        $this->forge->addKey('codigo_continente', true);
        $this->forge->createTable('continente');
    }

    public function down()
    {
        //
        $this->forge->dropTable('continente');
    }
}
