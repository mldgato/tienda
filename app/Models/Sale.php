<?php

namespace App\Models;

use CodeIgniter\Model;

class Sale extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sales';
    protected $primaryKey       = 'id_sale';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pay', 'date', 'id_user', 'id_customer'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findAllWithData($del, $al)
    {
        return $this->select('sales.*, users.name, customers.customer')
            ->join('users', 'users.id_user = sales.id_user')
            ->join('customers', 'customers.id_customer = sales.id_customer')
            ->where('sales.date >=', $del) // Usar >= en lugar de igual
            ->where('sales.date <=', $al)  // Usar <= en lugar de igual
            ->orderBy('sales.date', 'DESC')
            ->findAll();
    }
}
