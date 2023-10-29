<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sale extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sale' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'pay' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_customer' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id_sale', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_customer', 'customers', 'id_customer', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sales');
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
