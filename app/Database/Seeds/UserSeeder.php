<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\Rol;

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
            'id_rol' => 1
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
            'id_rol' => 1
        ];
        $this->db->table('users')->insert($data);

        $rolesModel = new Rol();
        $roles = $rolesModel->findAll();

        for ($i = 0; $i < 3; $i++) {
            $user = $this->generateFakeUser($roles);
            $this->db->table('users')->insert($user);
        }
    }

    private function generateFakeUser($roles)
    {
        $fakerObject = Factory::create();
        $password = password_hash('12345678', PASSWORD_DEFAULT);
        $randomRoleId = $fakerObject->randomElement(array_column($roles, 'id_rol'));

        return array(
            'name' => $fakerObject->name,
            'email' => $fakerObject->email,
            'password' => $password,
            'id_rol' => 2
        );
    }
}
