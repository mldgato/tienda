<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Customer;

class SaleSeeder extends Seeder
{
    public function run()
    {
        $userModel = new User();
        $users = $userModel->where('id_rol', 2)->findAll();

        $customerModel = new Customer();
        $customers = $customerModel->findAll();

        for ($i = 0; $i < 180; $i++) {
            $sale = $this->generateFakeUser($users, $customers);
            $this->db->table('sales')->insert($sale);
        }
    }

    private function generateFakeUser($users, $customers)
    {
        $fakerObject = Factory::create();

        $randomUserId = $fakerObject->randomElement(array_column($users, 'id_user'));
        $randomCustomerId = $fakerObject->randomElement(array_column($customers, 'id_customer'));

        $startDate = '2023-09-01';
        $endDate = '2023-10-27';

        do {
            $dateWithTime = $fakerObject->dateTimeBetween($startDate, $endDate)->format('Y-m-d H:i:s');
            $dateWithoutTime = date('Y-m-d', strtotime($dateWithTime));
        } while (date('w', strtotime($dateWithoutTime)) == 0);

        return array(
            'pay' => 0,
            'date' => $dateWithTime,
            'id_user' => $randomUserId,
            'id_customer' => $randomCustomerId
        );
    }
}