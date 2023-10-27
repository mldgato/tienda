<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;

class CustomerController extends BaseController
{
    public function index()
    {
        if (session('id_rol') == 1 || session('id_rol') == 3) {
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
        if (session('id_rol') == 1 || session('id_rol') == 3) {
            $customerModel = new Customer();
            $customer = $customerModel->find($id_customer);
            $data['customer'] = $customer;
            return view('admin/customers/show', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }
}
