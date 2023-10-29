<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Saledetail;
use App\Models\User;

class CustomerController extends BaseController
{
    public function index()
    {
        if (session('id_rol') == 1 || session('id_rol') == 2) {
            $customerModel = new Customer();
            $customers = $customerModel->where('state', 1)->orderBy('customer', 'ASC')->findAll();
            $data['customers'] = $customers;
            return view('admin/customers/index', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function show($id_customer = 0)
    {
        // Carga el modelo de ventas
        $saleModel = new Sale();
        $sales = $saleModel->where('id_customer', $id_customer)->orderBy('date', 'DESC')->findAll();

        // Carga el modelo de detalles de ventas
        $salesDetailModel = new Saledetail();

        // Carga el modelo de clientes
        $customerModel = new Customer();
        $customer = $customerModel->find($id_customer);

        // Carga el modelo de usuarios (agregado)
        $userModel = new User();

        // Calcular el total de cada venta
        foreach ($sales as &$sale) {
            $details = $salesDetailModel->where('id_sale', $sale['id_sale'])->findAll();
            $total = 0;

            foreach ($details as $detail) {
                $total += $detail['price'] * $detail['quantity'];
            }

            $sale['total'] = $total;

            // Obtén el nombre del usuario relacionado con la venta
            $user = $userModel->find($sale['id_user']);
            $sale['user_name'] = $user['name'];
        }

        // Carga la vista y pasa los datos de las ventas, del cliente y del usuario
        return view('admin/customers/show', ['sales' => $sales, 'customer' => $customer]);
    }
}
