<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['name', 'email', 'password', 'image', 'state', 'id_rol'];

    public function getUser($data)
    {
        $Usuario = $this->db->table('users');
        $Usuario->where($data);
        return $Usuario->get()->getResultArray();
    }
}
