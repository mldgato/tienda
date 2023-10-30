<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Saledetail;
use App\Models\Product;

class Home extends BaseController
{
    public function index(): string
    {
        $message = session('message');
        return view('login', ['message' => $message]);
    }

    public function inicio()
    {
        $saledetailModel = new Saledetail();
        $productModel = new Product();

        // Obtener los 10 productos más vendidos
        $query = $saledetailModel
            ->select('id_product, SUM(quantity) as total_quantity')
            ->groupBy('id_product')
            ->orderBy('total_quantity', 'DESC')
            ->limit(10)
            ->find();

        $topProducts = [];

        foreach ($query as $row) {
            $product = $productModel->find($row['id_product']);
            $product['total_quantity'] = $row['total_quantity'];
            $topProducts[] = $product;
        }

        // Obtener las ventas totales por usuarios con id_rol igual a 2
        $db = db_connect();
        $query = $db->query("SELECT u.name, SUM(s.pay) as total_sales
                        FROM users u
                        INNER JOIN sales s ON u.id_user = s.id_user
                        WHERE u.id_rol = 2
                        GROUP BY u.id_user")->getResult();

        // Cargar la vista con los productos más vendidos y los datos de ventas totales
        return view('admin/index', ['topProducts' => $topProducts, 'userSalesData' => $query]);
    }


    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $users = new User();

        $datosUsuario = $users->getUser(['email' => $email]);
        if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password']) && $datosUsuario[0]['state'] == 1) {
            $data = [
                'id_user' => $datosUsuario[0]['id_user'],
                'name' => $datosUsuario[0]['name'],
                'email' => $datosUsuario[0]['email'],
                'image' => $datosUsuario[0]['image'],
                'id_rol' => $datosUsuario[0]['id_rol'],
                'isLogin' => true
            ];
            $session = session();
            $session->set($data);

            return redirect()->to(base_url('admin'))->with('message', 'Bienvenido al sistema')->with('alert-class', 'success');
        } else {
            return redirect()->to(base_url('/'))->with('message', 'Usuario o contraseña incorrectos')->with('alert-class', 'error');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'))->with('message', '0');
    }
}
