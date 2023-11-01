<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Sale;
use App\Models\User;
use App\Models\Saledetail;
use App\Models\Customer;

class PdfController extends BaseController
{
    public function index($id_sale = 0)
    {
        $data = $this->prepareData($id_sale);

        return view('admin/reports/index', $data);
    }

    function htmlToPDF($id_sale = 0)
    {
        $dompdf = new \Dompdf\Dompdf();

        // Cargar las variables necesarias y pasarlas a la vista
        $data = $this->prepareData($id_sale);

        $dompdf->loadHtml(view('admin/reports/index', $data));
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }

    private function prepareData($id_sale)
    {
        $saleModel = new Sale();
        $sale = $saleModel->find($id_sale);

        $userModel = new User();
        $user = $userModel->find($sale['id_user']);

        $saledetailModel = new Saledetail();
        $saledetails = $saledetailModel->findAllWithProducts($id_sale);

        $total = 0;

        foreach ($saledetails as $detail) {
            $price = $detail['price'];
            $quantity = $detail['quantity'];
            $total += $price * $quantity;
        }

        $customerModel = new Customer();
        $customer = $customerModel->find($sale['id_customer']);

        $sale['total'] = $total;

        $data['sale'] = $sale;
        $data['user'] = $user;
        $data['saledetails'] = $saledetails;
        $data['customer'] = $customer;

        return $data;
    }
}
