<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rol' => [
                'type'              =>  'INT',
                'constraint'        =>  5,
                'unsigned'          =>  true,
                'auto_increment'    => true,
            ],
            'rolname' => [
                'type'              =>  'VARCHAR',
                'constraint'        =>  255,
                'unique'            => true,
            ],
        ]);
        $this->forge->addKey('id_rol', true);
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
