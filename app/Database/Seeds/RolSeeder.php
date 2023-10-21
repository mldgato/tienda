<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolSeeder extends Seeder
{
    public function run()
    {
        $rolname = 'Administrador';
        $data = [
            'rolname' => $rolname
        ];
        $this->db->table('roles')->insert($data);

        $rolname = 'Vendedor';
        $data = [
            'rolname' => $rolname
        ];
        $this->db->table('roles')->insert($data);
    }
}
