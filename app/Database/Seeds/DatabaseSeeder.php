<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('RolSeeder');
        $this->call('UserSeeder');
        $this->call('SupplierSeeder');
        $this->call('CustomerSeeder');
    }
}
