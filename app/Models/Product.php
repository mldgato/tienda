<?php
 
namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id_product';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cod', 'product_name', 'brand', 'quantity', 'cost', 'price', 'image', 'id_supplier', 'state'];

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

    public function findAllWithSupplier()
    {
        return $this->select('products.*, suppliers.company AS proveedor')
            ->join('suppliers', 'suppliers.id_supplier = products.id_supplier')
            ->where('products.state', 1)->orderBy('product_name', 'ASC')
            ->findAll();
    }
}
