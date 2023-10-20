<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'created_at'];

    public function getUser($data)
    {
        $Usuario = $this->db->table('users');
        $Usuario->where($data);
        return $Usuario->get()->getResultArray();
    }
}
