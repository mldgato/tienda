<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_usuario' =>[
                'type'              =>  'INT',
                'constraint'        =>  5,
                'unsigned'          =>  true,
                'auto_increment'    => true,
            ],
            'name' =>[
                'type'              =>  'VARCHAR',
                'constraint'        =>  255,
            ],
            'email' =>[
                'type'              =>  'VARCHAR',
                'constraint'        =>  255,
                'unique'            => true,
            ],
            'password' =>[
                'type'              =>  'VARCHAR',
                'constraint'        =>  255,
            ],
            'image' =>[
                'type'              =>  'VARCHAR',
                'constraint'        =>  255,
                'null'              => true,
            ],
            'rol' =>[
                'type' => 'TINYINT',
                'unsigned'          => true,
                'default'           => 0,
                'constraint'        => 2,
            ],
        ]);
        $this->forge->addKey('id_usuario', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
