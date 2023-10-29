<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Saledetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_saledetail' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_sale' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_product' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addKey('id_saledetail', true);
        $this->forge->addForeignKey('id_sale', 'sales', 'id_sale', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_product', 'products', 'id_product', 'CASCADE', 'CASCADE');
        $this->forge->createTable('saledetails');
    }

    public function down()
    {
        $this->forge->dropTable('saledetails');
    }
}
