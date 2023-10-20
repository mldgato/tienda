<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        $name = 'Manuel Lisandro Dardón';
        $email = 'manueldardon@hotmail.com';
        $password = password_hash('12345678', PASSWORD_DEFAULT);
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'image' => NULL,
            'rol' => 1
        ];
        $this->db->table('users')->insert($data);

        $name = 'Glenda Rocío Ramírez';
        $email = 'glenda.ramirez.200811527@gmail.com';
        $password = password_hash('12345678', PASSWORD_DEFAULT);
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'image' => NULL,
            'rol' => 1
        ];
        $this->db->table('users')->insert($data);

        for ($i = 0; $i < 8; $i++) {
            $user = $this->generateFakeUser();
            $this->db->table('users')->insert($user);
        }
    }

    private function generateFakeUser()
    {
        $fakerObject = Factory::create();

        $password = password_hash('12345678', PASSWORD_DEFAULT);

        return array(
            'name' => $fakerObject->name,
            'email' => $fakerObject->email,
            'password' => $password,
            'rol' => $fakerObject->randomElement([0, 1])
        );
    }
}
