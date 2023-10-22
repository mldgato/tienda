<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 8; $i++) {
            $user = $this->generateFakeUser();
            $this->db->table('suppliers')->insert($user);
        }
    }

    private function generateFakeUser()
    {
        $fakerObject = Factory::create();

        return array(
            'taxnumber' => $fakerObject->numberBetween(11111111, 99999999),
            'company' => $fakerObject->company,
            'address' => $fakerObject->address,
            'phone' => $fakerObject->phoneNumber,
            'seller' => $fakerObject->name
        );
    }
}
