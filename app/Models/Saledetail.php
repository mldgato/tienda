<?php

namespace App\Models;

use CodeIgniter\Model;

class Saledetail extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'saledetails';
    protected $primaryKey       = 'id_saledetail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_sale', 'id_product', 'quantity', 'price'];

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

    public function findAllWithProducts($id_sale)
    {
        return $this->select('saledetails.*, products.product_name, products.image')
            ->join('products', 'products.id_product = saledetails.id_product')
            ->where('saledetails.id_sale', $id_sale)->orderBy('saledetails.id_saledetail', 'ASC')
            ->findAll();
    }
}
