<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Sale;
use App\Models\Product;
use Faker\Factory;

class SaledetailSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        // Obtén todos los registros de las tablas sales y products
        $sales = $this->db->table('sales')->get()->getResultArray();
        $products = $this->db->table('products')->get()->getResultArray();

        // Llena la tabla saledetails con datos aleatorios
        foreach (range(1, 1000) as $index) {
            $randomSale = $faker->randomElement($sales);
            $randomProduct = $faker->randomElement($products);
            $quantity = $faker->numberBetween(1, 5);

            // Obtén el precio del producto seleccionado
            $price = $randomProduct['price'];

            $data = [
                'id_sale' => $randomSale['id_sale'],
                'id_product' => $randomProduct['id_product'],
                'quantity' => $quantity,
                'price' => $price,
            ];

            $this->db->table('saledetails')->insert($data);
        }
    }
}
