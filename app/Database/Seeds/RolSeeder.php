<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'rolname' => 'Administrador'
        ];
        $this->db->table('roles')->insert($data);

        $data = [
            'rolname' => 'Vendedor'
        ];
        $this->db->table('roles')->insert($data);
    }
}
