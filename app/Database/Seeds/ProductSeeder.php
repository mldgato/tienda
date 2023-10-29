<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $records = [
            'id_product' => 1,
            'cod' => '7324',
            'product_name' => 'Anillos de Caramelo 40 Unidades',
            'brand' => 'Ring Pop',
            'quantity' => 92,
            'cost' => 90.00,
            'price' => 110.00,
            'image' => '1.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 2,
            'cod' => '7672',
            'product_name' => 'Mini Chocolates Surtidos',
            'brand' => 'Hershey´s',
            'quantity' => 12,
            'cost' => 115.25,
            'price' => 159.95,
            'image' => '2.jpg',
            'id_supplier' => 7,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 3,
            'cod' => '1731',
            'product_name' => 'Azúcar Morena',
            'brand' => 'Tulipan',
            'quantity' => 46,
            'cost' => 13.75,
            'price' => 17.40,
            'image' => '3.jpg',
            'id_supplier' => 3,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 4,
            'cod' => '9637',
            'product_name' => 'Frijoles negros 993 gr',
            'brand' => 'Ducal',
            'quantity' => 70,
            'cost' => 9.50,
            'price' => 12.15,
            'image' => '4.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 5,
            'cod' => '6136',
            'product_name' => 'Sal Yodada 908 gr',
            'brand' => 'B&Z',
            'quantity' => 35,
            'cost' => 1.80,
            'price' => 2.65,
            'image' => '5.jpg',
            'id_supplier' => 10,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 6,
            'cod' => '7414',
            'product_name' => 'Pasta Larga 200 gr',
            'brand' => 'Ina',
            'quantity' => 61,
            'cost' => 3.25,
            'price' => 4.10,
            'image' => '6.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 7,
            'cod' => '3589',
            'product_name' => 'Sopa de Pollo con Fideos',
            'brand' => 'Maggi',
            'quantity' => 4,
            'cost' => 1.80,
            'price' => 2.80,
            'image' => '7.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 8,
            'cod' => '9660',
            'product_name' => 'Arroz Precocido 400 gr',
            'brand' => 'Gallo Dorado',
            'quantity' => 70,
            'cost' => 6.75,
            'price' => 7.45,
            'image' => '8.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 9,
            'cod' => '3265',
            'product_name' => 'Avena Mosh 900 gr',
            'brand' => 'Quaker',
            'quantity' => 47,
            'cost' => 22.30,
            'price' => 26.50,
            'image' => '9.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 10,
            'cod' => '2822',
            'product_name' => 'Frijoles rojos',
            'brand' => 'Albaj',
            'quantity' => 69,
            'cost' => 8.75,
            'price' => 10.40,
            'image' => '10.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 11,
            'cod' => '5773',
            'product_name' => 'Arroz Precocido 400 gr',
            'brand' => 'Molinero',
            'quantity' => 96,
            'cost' => 6.80,
            'price' => 7.10,
            'image' => '11.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 12,
            'cod' => '5213',
            'product_name' => 'Premezcla para Hot Cake',
            'brand' => 'Gold Medal',
            'quantity' => 19,
            'cost' => 30.25,
            'price' => 38.15,
            'image' => '12.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 13,
            'cod' => '6579',
            'product_name' => 'Salsa de Tomate Ranchera',
            'brand' => 'Naturas',
            'quantity' => 73,
            'cost' => 2.40,
            'price' => 3.70,
            'image' => '13.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 14,
            'cod' => '6874',
            'product_name' => 'Aceite Natural Blend 800 ml',
            'brand' => 'Mazola',
            'quantity' => 89,
            'cost' => 17.50,
            'price' => 21.00,
            'image' => '14.jpg',
            'id_supplier' => 3,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 15,
            'cod' => '8758',
            'product_name' => 'Harina de Maiz 2000 gr',
            'brand' => 'Maseca',
            'quantity' => 48,
            'cost' => 24.80,
            'price' => 27.35,
            'image' => '15.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 16,
            'cod' => '4547',
            'product_name' => 'Tostada de maiz onduladas  360 gr',
            'brand' => 'Milpa Real',
            'quantity' => 65,
            'cost' => 14.20,
            'price' => 16.95,
            'image' => '16.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 17,
            'cod' => '4974',
            'product_name' => 'Café Clásico Instantáneo 300 g',
            'brand' => 'Nescafe',
            'quantity' => 20,
            'cost' => 53.60,
            'price' => 59.95,
            'image' => '17.jpg',
            'id_supplier' => 4,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 18,
            'cod' => '2971',
            'product_name' => 'Café Instantateno 250 gr',
            'brand' => 'Incasa',
            'quantity' => 36,
            'cost' => 47.90,
            'price' => 49.00,
            'image' => '18.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 19,
            'cod' => '6720',
            'product_name' => 'Crema Esencia Vainilla 250 ml',
            'brand' => 'Castilla',
            'quantity' => 56,
            'cost' => 4.05,
            'price' => 4.70,
            'image' => '19.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 20,
            'cod' => '7797',
            'product_name' => 'Concentrado de Horchata de coco',
            'brand' => 'B&B',
            'quantity' => 11,
            'cost' => 20.70,
            'price' => 23.10,
            'image' => '20.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 21,
            'cod' => '3641',
            'product_name' => 'Concentrado de Mora 678 ml',
            'brand' => 'B&B',
            'quantity' => 85,
            'cost' => 20.10,
            'price' => 23.10,
            'image' => '21.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 22,
            'cod' => '5761',
            'product_name' => 'Syrup Caramelo',
            'brand' => 'Hershey´s',
            'quantity' => 77,
            'cost' => 31.35,
            'price' => 38.80,
            'image' => '22.jpg',
            'id_supplier' => 7,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 23,
            'cod' => '3342',
            'product_name' => 'Pollo ahumado lb',
            'brand' => 'Pollo Rey',
            'quantity' => 75,
            'cost' => 24.80,
            'price' => 27.00,
            'image' => '23.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 24,
            'cod' => '4686',
            'product_name' => 'Carne Horneada de Cerdo 340g',
            'brand' => 'Spam',
            'quantity' => 59,
            'cost' => 33.65,
            'price' => 37.50,
            'image' => '24.jpg',
            'id_supplier' => 4,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 25,
            'cod' => '9180',
            'product_name' => 'Jocon de Pollo 300 gr',
            'brand' => 'Baqu',
            'quantity' => 66,
            'cost' => 18.75,
            'price' => 22.10,
            'image' => '25.jpg',
            'id_supplier' => 3,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 26,
            'cod' => '2464',
            'product_name' => 'Salchicas de Pollo Picante',
            'brand' => 'Goya',
            'quantity' => 98,
            'cost' => 8.95,
            'price' => 10.10,
            'image' => '26.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 27,
            'cod' => '6135',
            'product_name' => 'Carne al pastor con salsa 215 gr',
            'brand' => 'Chata',
            'quantity' => 42,
            'cost' => 40.15,
            'price' => 44.00,
            'image' => '27.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 28,
            'cod' => '4838',
            'product_name' => 'Carne de Cerdo Lite 340 gr',
            'brand' => 'Spam',
            'quantity' => 25,
            'cost' => 33.90,
            'price' => 37.50,
            'image' => '28.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 29,
            'cod' => '4357',
            'product_name' => 'Melocotones en almibar',
            'brand' => 'Del Monte',
            'quantity' => 17,
            'cost' => 22.00,
            'price' => 24.00,
            'image' => '29.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 30,
            'cod' => '7100',
            'product_name' => '4 Pack Frutas Mixtas sin azúcar',
            'brand' => 'Great Value',
            'quantity' => 4,
            'cost' => 21.65,
            'price' => 22.40,
            'image' => '30.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 31,
            'cod' => '9599',
            'product_name' => 'Rodajas de melocotón 411 gr',
            'brand' => 'Great Value',
            'quantity' => 93,
            'cost' => 14.00,
            'price' => 16.00,
            'image' => '31.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 32,
            'cod' => '6660',
            'product_name' => 'Guindas Rojas 227 g',
            'brand' => 'Kilio´s',
            'quantity' => 15,
            'cost' => 22.00,
            'price' => 25.00,
            'image' => '32.jpg',
            'id_supplier' => 3,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 33,
            'cod' => '7741',
            'product_name' => 'Maíz dulce en grano lata',
            'brand' => 'Calvo',
            'quantity' => 47,
            'cost' => 7.75,
            'price' => 8.10,
            'image' => '33.jpg',
            'id_supplier' => 10,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 34,
            'cod' => '3007',
            'product_name' => 'Elote dorado lata',
            'brand' => 'La Costeña',
            'quantity' => 52,
            'cost' => 9.00,
            'price' => 9.95,
            'image' => '34.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 35,
            'cod' => '5199',
            'product_name' => 'Champiñones rebanados',
            'brand' => 'Kilio´s',
            'quantity' => 18,
            'cost' => 8.00,
            'price' => 9.00,
            'image' => '35.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 36,
            'cod' => '7522',
            'product_name' => 'Garbanzo en lata',
            'brand' => 'Kilio´s',
            'quantity' => 77,
            'cost' => 13.00,
            'price' => 14.35,
            'image' => '36.jpg',
            'id_supplier' => 7,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 37,
            'cod' => '2935',
            'product_name' => 'Cereal Corn Flakes',
            'brand' => 'Gran Día',
            'quantity' => 49,
            'cost' => 18.00,
            'price' => 18.90,
            'image' => '37.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 38,
            'cod' => '2330',
            'product_name' => 'Cereal dulce Honey Monster',
            'brand' => 'Stars',
            'quantity' => 29,
            'cost' => 30.00,
            'price' => 40.00,
            'image' => '38.jpg',
            'id_supplier' => 10,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 39,
            'cod' => '7044',
            'product_name' => 'Cereal Froot Loops',
            'brand' => 'Kellogg´s',
            'quantity' => 33,
            'cost' => 33.00,
            'price' => 34.75,
            'image' => '39.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 40,
            'cod' => '7423',
            'product_name' => 'Cereal Zucaritas',
            'brand' => 'Kellogg´s',
            'quantity' => 8,
            'cost' => 33.00,
            'price' => 35.90,
            'image' => '40.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 41,
            'cod' => '7549',
            'product_name' => 'Coco Rallado',
            'brand' => 'Mada',
            'quantity' => 0,
            'cost' => 15.00,
            'price' => 15.90,
            'image' => '41.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 42,
            'cod' => '5770',
            'product_name' => 'Polvo para hornear',
            'brand' => 'Sasson',
            'quantity' => 61,
            'cost' => 9.00,
            'price' => 9.40,
            'image' => '42.jpg',
            'id_supplier' => 4,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 43,
            'cod' => '9218',
            'product_name' => 'Harina para panqueques',
            'brand' => 'Nutri',
            'quantity' => 85,
            'cost' => 27.00,
            'price' => 28.20,
            'image' => '43.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 44,
            'cod' => '5835',
            'product_name' => 'Almendra Lasca',
            'brand' => 'Sasson',
            'quantity' => 2,
            'cost' => 11.00,
            'price' => 12.70,
            'image' => '44.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 45,
            'cod' => '6257',
            'product_name' => 'Crema Chantilly 50 gr',
            'brand' => 'De la Familia',
            'quantity' => 71,
            'cost' => 6.00,
            'price' => 6.30,
            'image' => '45.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 46,
            'cod' => '5319',
            'product_name' => 'Premezcla para Brownie',
            'brand' => 'Gold Medal',
            'quantity' => 82,
            'cost' => 26.00,
            'price' => 28.30,
            'image' => '46.jpg',
            'id_supplier' => 3,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 47,
            'cod' => '1918',
            'product_name' => 'Gaseosa de cola sin azúcar',
            'brand' => 'Coca Cola',
            'quantity' => 6,
            'cost' => 17.00,
            'price' => 18.60,
            'image' => '47.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 48,
            'cod' => '4397',
            'product_name' => 'Gaseosas Pack',
            'brand' => 'Coca Cola',
            'quantity' => 44,
            'cost' => 30.00,
            'price' => 33.80,
            'image' => '48.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 49,
            'cod' => '4956',
            'product_name' => 'Lata Pack de 8',
            'brand' => 'Fanta',
            'quantity' => 54,
            'cost' => 26.00,
            'price' => 27.50,
            'image' => '49.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 50,
            'cod' => '8268',
            'product_name' => 'Gaseosa Limoneto',
            'brand' => 'H2O',
            'quantity' => 34,
            'cost' => 5.00,
            'price' => 5.75,
            'image' => '50.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 51,
            'cod' => '1052',
            'product_name' => 'Cerveza en botella 6 Pack',
            'brand' => 'Monte Carlo',
            'quantity' => 15,
            'cost' => 55.00,
            'price' => 59.00,
            'image' => '51.jpg',
            'id_supplier' => 10,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 52,
            'cod' => '6591',
            'product_name' => 'Cerveza 355 ml botella 6 pack',
            'brand' => 'Gallo',
            'quantity' => 84,
            'cost' => 40.00,
            'price' => 45.00,
            'image' => '52.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 53,
            'cod' => '4198',
            'product_name' => '6 Pack Reserva Cerveza',
            'brand' => 'Cabro',
            'quantity' => 73,
            'cost' => 50.00,
            'price' => 52.00,
            'image' => '53.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 54,
            'cod' => '8342',
            'product_name' => '24 Pack cerveza lata',
            'brand' => 'Modelo',
            'quantity' => 41,
            'cost' => 115.20,
            'price' => 125.00,
            'image' => '54.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 55,
            'cod' => '6479',
            'product_name' => 'Vino Merlot',
            'brand' => 'Reservado',
            'quantity' => 29,
            'cost' => 38.00,
            'price' => 39.95,
            'image' => '55.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 56,
            'cod' => '1335',
            'product_name' => 'Vino Concha y Toro',
            'brand' => 'Reservado',
            'quantity' => 57,
            'cost' => 38.00,
            'price' => 39.95,
            'image' => '56.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 57,
            'cod' => '7079',
            'product_name' => 'Vino tinto',
            'brand' => 'Carmenere',
            'quantity' => 0,
            'cost' => 40.00,
            'price' => 42.00,
            'image' => '57.jpg',
            'id_supplier' => 10,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 58,
            'cod' => '2027',
            'product_name' => 'Vino caja Pirque',
            'brand' => 'Clos',
            'quantity' => 98,
            'cost' => 23.00,
            'price' => 24.95,
            'image' => '58.jpg',
            'id_supplier' => 3,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 59,
            'cod' => '4734',
            'product_name' => 'Vino Primium Merlot caja',
            'brand' => 'Don Simon',
            'quantity' => 49,
            'cost' => 22.00,
            'price' => 25.00,
            'image' => '59.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 60,
            'cod' => '7054',
            'product_name' => 'Sangria Vino Tinto',
            'brand' => 'Don Simon',
            'quantity' => 34,
            'cost' => 18.00,
            'price' => 20.00,
            'image' => '60.jpg',
            'id_supplier' => 4,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 61,
            'cod' => '4708',
            'product_name' => 'Botran Uva botella',
            'brand' => 'VIP',
            'quantity' => 9,
            'cost' => 9.80,
            'price' => 10.95,
            'image' => '61.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 62,
            'cod' => '4300',
            'product_name' => 'Botran Fresa botella',
            'brand' => 'VIP',
            'quantity' => 90,
            'cost' => 9.80,
            'price' => 10.95,
            'image' => '62.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 63,
            'cod' => '8444',
            'product_name' => 'Sangria Red lata',
            'brand' => 'Barefoot',
            'quantity' => 39,
            'cost' => 15.00,
            'price' => 17.00,
            'image' => '63.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 64,
            'cod' => '8731',
            'product_name' => 'Mojito lata',
            'brand' => 'Cubata',
            'quantity' => 25,
            'cost' => 5.50,
            'price' => 6.50,
            'image' => '64.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 65,
            'cod' => '1921',
            'product_name' => 'Pollo agridulce congelado',
            'brand' => 'Pio Lindo',
            'quantity' => 97,
            'cost' => 34.00,
            'price' => 36.90,
            'image' => '65.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 66,
            'cod' => '3883',
            'product_name' => 'Pupusas congeladas de queso',
            'brand' => 'Ya está',
            'quantity' => 97,
            'cost' => 30.00,
            'price' => 33.30,
            'image' => '66.jpg',
            'id_supplier' => 4,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 67,
            'cod' => '5909',
            'product_name' => 'Pupusas congeladas de queso y loroco',
            'brand' => 'Ya está',
            'quantity' => 21,
            'cost' => 30.00,
            'price' => 33.30,
            'image' => '67.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 68,
            'cod' => '1841',
            'product_name' => 'Sandwich relleno peperoni queso',
            'brand' => 'Great Value',
            'quantity' => 51,
            'cost' => 21.00,
            'price' => 25.00,
            'image' => '68.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 69,
            'cod' => '2957',
            'product_name' => 'Piernas rostizadas de pollo',
            'brand' => 'Pio Lindo',
            'quantity' => 61,
            'cost' => 25.00,
            'price' => 29.00,
            'image' => '69.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 70,
            'cod' => '5628',
            'product_name' => 'Burritos de Pizza',
            'brand' => 'Ya está',
            'quantity' => 8,
            'cost' => 7.00,
            'price' => 9.00,
            'image' => '70.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 71,
            'cod' => '5934',
            'product_name' => 'Tamal de pollo congelado',
            'brand' => 'Baqu',
            'quantity' => 51,
            'cost' => 15.00,
            'price' => 16.05,
            'image' => '71.jpg',
            'id_supplier' => 4,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 72,
            'cod' => '3467',
            'product_name' => 'Lasagna de 5 quesos',
            'brand' => 'Great Value',
            'quantity' => 81,
            'cost' => 21.00,
            'price' => 23.80,
            'image' => '72.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 73,
            'cod' => '1762',
            'product_name' => 'Tortita empanizada de pollo',
            'brand' => 'Pollo Rey',
            'quantity' => 95,
            'cost' => 14.00,
            'price' => 18.00,
            'image' => '73.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 74,
            'cod' => '5888',
            'product_name' => 'Longaniza primium',
            'brand' => 'La Blanca',
            'quantity' => 12,
            'cost' => 27.00,
            'price' => 31.00,
            'image' => '74.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 75,
            'cod' => '8426',
            'product_name' => 'Vegetales congelados mixtos',
            'brand' => 'Great Value',
            'quantity' => 40,
            'cost' => 28.50,
            'price' => 30.70,
            'image' => '75.jpg',
            'id_supplier' => 4,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 76,
            'cod' => '7571',
            'product_name' => 'Maiz dulce en grano congelado',
            'brand' => 'Great Value',
            'quantity' => 0,
            'cost' => 11.25,
            'price' => 12.95,
            'image' => '76.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 77,
            'cod' => '1315',
            'product_name' => 'Bayas congeladas mixtas',
            'brand' => 'Great Value',
            'quantity' => 16,
            'cost' => 100.00,
            'price' => 119.00,
            'image' => '77.jpg',
            'id_supplier' => 2,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 78,
            'cod' => '9160',
            'product_name' => 'Arándanos congelados',
            'brand' => 'Great Value',
            'quantity' => 83,
            'cost' => 90.00,
            'price' => 94.90,
            'image' => '78.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 79,
            'cod' => '4833',
            'product_name' => 'Fresas congeladas',
            'brand' => 'Great Value',
            'quantity' => 53,
            'cost' => 29.00,
            'price' => 32.00,
            'image' => '79.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 80,
            'cod' => '6300',
            'product_name' => 'Mezcla de frutas congeladas',
            'brand' => 'Vidosa',
            'quantity' => 37,
            'cost' => 44.30,
            'price' => 48.50,
            'image' => '80.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 81,
            'cod' => '7718',
            'product_name' => 'Detergente en polvo',
            'brand' => 'Ariel',
            'quantity' => 6,
            'cost' => 30.00,
            'price' => 34.50,
            'image' => '81.jpg',
            'id_supplier' => 10,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 82,
            'cod' => '1892',
            'product_name' => 'Detergente en polvo',
            'brand' => 'Fab',
            'quantity' => 27,
            'cost' => 55.00,
            'price' => 60.00,
            'image' => '82.jpg',
            'id_supplier' => 4,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 83,
            'cod' => '8614',
            'product_name' => 'Limpiador cloro en polvo',
            'brand' => 'Ajax',
            'quantity' => 52,
            'cost' => 19.00,
            'price' => 22.25,
            'image' => '83.jpg',
            'id_supplier' => 1,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 84,
            'cod' => '7138',
            'product_name' => 'Desinfectante lavanda',
            'brand' => 'Fabuloso',
            'quantity' => 10,
            'cost' => 45.00,
            'price' => 48.00,
            'image' => '84.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 85,
            'cod' => '6205',
            'product_name' => 'Desinfectante Citronela',
            'brand' => 'Magia Blanca',
            'quantity' => 56,
            'cost' => 8.70,
            'price' => 9.15,
            'image' => '85.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 86,
            'cod' => '6215',
            'product_name' => 'Limpiador para baños',
            'brand' => 'Harpic',
            'quantity' => 18,
            'cost' => 24.00,
            'price' => 26.00,
            'image' => '86.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 87,
            'cod' => '6339',
            'product_name' => 'Lavatrastes en barra menta',
            'brand' => 'Zagaz',
            'quantity' => 8,
            'cost' => 7.00,
            'price' => 7.15,
            'image' => '87.jpg',
            'id_supplier' => 7,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 88,
            'cod' => '4165',
            'product_name' => 'Lavaplatos de limón',
            'brand' => 'Axion',
            'quantity' => 33,
            'cost' => 19.00,
            'price' => 19.80,
            'image' => '88.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 89,
            'cod' => '3886',
            'product_name' => 'Shampoo con acondicionador',
            'brand' => 'Pantene',
            'quantity' => 86,
            'cost' => 70.00,
            'price' => 73.00,
            'image' => '89.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 90,
            'cod' => '1458',
            'product_name' => 'Shampoo hidratante',
            'brand' => 'Loreal',
            'quantity' => 21,
            'cost' => 40.00,
            'price' => 42.50,
            'image' => '90.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 91,
            'cod' => '5693',
            'product_name' => 'Shampoo anticaspa',
            'brand' => 'Head Shoulders',
            'quantity' => 37,
            'cost' => 68.00,
            'price' => 70.00,
            'image' => '91.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 92,
            'cod' => '7339',
            'product_name' => 'Shampoo control caída',
            'brand' => 'Head Shoulders',
            'quantity' => 55,
            'cost' => 55.00,
            'price' => 59.00,
            'image' => '92.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 93,
            'cod' => '7926',
            'product_name' => 'Avena cereal infantil',
            'brand' => 'Nestle',
            'quantity' => 8,
            'cost' => 25.00,
            'price' => 28.00,
            'image' => '93.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 94,
            'cod' => '2176',
            'product_name' => 'Trigo leche cereal infantil',
            'brand' => 'Nestle',
            'quantity' => 56,
            'cost' => 25.00,
            'price' => 28.15,
            'image' => '94.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 95,
            'cod' => '7136',
            'product_name' => 'Arroz cereal infantil',
            'brand' => 'Nestle',
            'quantity' => 29,
            'cost' => 25.00,
            'price' => 28.00,
            'image' => '95.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 96,
            'cod' => '1927',
            'product_name' => 'Galletitas de fresa',
            'brand' => 'Gerber',
            'quantity' => 16,
            'cost' => 33.00,
            'price' => 36.00,
            'image' => '96.jpg',
            'id_supplier' => 9,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 97,
            'cod' => '1573',
            'product_name' => 'Pañales talla 1 96 Unidades',
            'brand' => 'Pampers',
            'quantity' => 38,
            'cost' => 200.00,
            'price' => 210.00,
            'image' => '97.jpg',
            'id_supplier' => 6,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 98,
            'cod' => '6641',
            'product_name' => 'Pañales talla 0 31 unidades',
            'brand' => 'Pampers',
            'quantity' => 3,
            'cost' => 75.00,
            'price' => 79.00,
            'image' => '98.jpg',
            'id_supplier' => 5,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 99,
            'cod' => '1209',
            'product_name' => 'Pañales talla 3 78 UDS',
            'brand' => 'Pampers',
            'quantity' => 93,
            'cost' => 250.00,
            'price' => 258.00,
            'image' => '99.jpg',
            'id_supplier' => 7,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
        $records = [
            'id_product' => 100,
            'cod' => '5788',
            'product_name' => 'Pañales talla 7 144 Uds',
            'brand' => 'Pampers',
            'quantity' => 2,
            'cost' => 380.00,
            'price' => 385.00,
            'image' => '100.jpg',
            'id_supplier' => 8,
            'state' => 1
        ];
        $this->db->table('products')->insert($records);
    }
}
