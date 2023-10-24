<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_product' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'cod' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'cost' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'id_supplier' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'state' => [
                'type' => 'TINYINT',
                'default' => 1,
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('id_product', true);
        $this->forge->addForeignKey('id_supplier', 'suppliers', 'id_supplier', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
