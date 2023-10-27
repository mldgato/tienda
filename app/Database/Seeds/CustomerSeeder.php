<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            $customer = $this->generateFakeUser();
            $this->db->table('customers')->insert($customer);
        }
    }

    private function generateFakeUser()
    {
        $fakerObject = Factory::create();

        return array(
            'customer' => $fakerObject->name,
            'customer_email' => $fakerObject->email,
            'taxnumber' => $fakerObject->numberBetween(11111111, 99999999),
            'address' => $fakerObject->address,
            'phone' => $fakerObject->phoneNumber,
        );
    }
}
