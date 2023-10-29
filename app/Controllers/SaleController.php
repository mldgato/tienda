<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Saledetail;
use App\Models\Customer;
use App\Models\User;

class SaleController extends BaseController
{
    public function index()
    {
        //
    }

    public function products()
    {
        if (session('id_rol') == 1 || session('id_rol') == 2) {
            $productModel = new Product();
            $products = $productModel->findAllWithSupplier();

            // Recorre los productos y asigna la clase CSS en función de quantity
            foreach ($products as &$product) {
                if ($product['quantity'] == 0) {
                    $product['classrow'] = 'table-danger';
                } elseif ($product['quantity'] >= 1 && $product['quantity'] <= 10) {
                    $product['classrow'] = 'table-warning';
                } else {
                    $product['classrow'] = 'table-success';
                }
            }

            $data['products'] = $products;
            return view('admin/sales/products', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function addToCart($productId)
    {
        // Obtener el producto de la base de datos
        $model = new Product();
        $product = $model->find($productId);

        if ($product) {
            // Verificar si el producto ya está en el carrito
            $cart = session('cart') ? session('cart') : [];

            if (array_key_exists($productId, $cart)) {
                // Si el producto ya está en el carrito, aumentar la cantidad
                $cart[$productId]['quantity'] += 1;
                // Verificar si la cantidad no supera el stock disponible
                if ($cart[$productId]['quantity'] > $product['quantity']) {
                    // Restaurar la cantidad al máximo disponible
                    $cart[$productId]['quantity'] = $product['quantity'];

                    // Establecer un mensaje de alerta en la sesión flash
                    session()->setFlashdata('alert-class', 'error');
                    session()->setFlashdata('message', 'Cantidad supera el stock disponible.');
                } else {
                    // Si se incrementa la cantidad, mostrar un mensaje de éxito
                    session()->setFlashdata('alert-class', 'success');
                    session()->setFlashdata('message', 'Producto agregado al carrito.');
                }
            } else {
                // Si el producto no está en el carrito, agregarlo
                $cart[$productId] = [
                    'product' => $product,
                    'quantity' => 1
                ];

                // Establecer un mensaje de éxito
                session()->setFlashdata('alert-class', 'success');
                session()->setFlashdata('message', 'Producto agregado al carrito.');
            }

            // Actualizar el carrito en la sesión
            session()->set('cart', $cart);
        }

        //return redirect()->to('sales');
        return redirect()->back();
    }

    public function reduceQuantity($productId)
    {
        // Obtener el carrito de la sesión
        $cart = session('cart') ? session('cart') : [];

        if (array_key_exists($productId, $cart)) {
            // Reducir la cantidad del producto en el carrito
            $cart[$productId]['quantity'] -= 1;

            // Si la cantidad llega a 0, eliminar el producto del carrito
            if ($cart[$productId]['quantity'] <= 0) {
                unset($cart[$productId]);
            }

            // Actualizar el carrito en la sesión
            session()->set('cart', $cart);

            session()->setFlashdata('alert-class', 'success');
            session()->setFlashdata('message', 'Producto restado del carrito.');

            // Redirigir de nuevo a la página del carrito
            return redirect()->back();
        }

        // Si el producto no existe en el carrito, redirigir a algún lugar apropiado
        return redirect()->back(); // Ajusta la redirección según tus necesidades.
    }

    public function deleteproduct($productId)
    {
        $cart = session('cart') ? session('cart') : [];
        unset($cart[$productId]);
        // Actualizar el carrito en la sesión
        session()->set('cart', $cart);

        session()->setFlashdata('alert-class', 'success');
        session()->setFlashdata('message', 'Producto eliminado del carrito.');

        // Redirigir de nuevo a la página del carrito
        return redirect()->back();
    }

    public function create()
    {
        // Obtener el carrito de la sesión
        $cart = session('cart') ? session('cart') : [];

        return view('admin/sales/create', ['cart' => $cart]);
    }

    public function searchCustomer($taxnumber)
    {
        $model = new Customer();
        $customer = $model->where('taxnumber', $taxnumber)->first();

        if ($customer) {
            $data = [
                'customer' => $customer['customer'],
                'customer_email' => $customer['customer_email'],
                'address' => $customer['address'],
                'phone' => $customer['phone']
            ];

            return $this->response->setJSON($data);
        }

        return $this->response->setJSON(['error' => 'Cliente no encontrado']);
    }

    public function store()
    {
        $validation = service('validation');

        // Define las reglas de validación para los campos
        $validation->setRules([
            'taxnumber' => 'required',
            'customer' => 'required',
            'customer_email' => 'valid_email', // Verifica que sea un correo electrónico válido
            'pay' => 'required|numeric', // Verifica que sea numérico
        ]);

        // Realiza la validación de datos
        if (!$validation->withRequest($this->request)->run()) {
            // Si hay errores de validación, redirige de vuelta con errores
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Verifica si el cliente ya existe en la base de datos
        $taxnumber = $this->request->getVar('taxnumber');
        $customerModel = new Customer();
        $existingCustomer = $customerModel->where('taxnumber', $taxnumber)->first();

        if (!$existingCustomer) {
            // Si el cliente no existe, crea un nuevo cliente
            $customerData = [
                'customer' => $this->request->getVar('customer'),
                'customer_email' => $this->request->getVar('customer_email'),
                'taxnumber' => $taxnumber,
                'address' => $this->request->getVar('address'),
                'phone' => $this->request->getVar('phone'),
            ];

            // Inserta el nuevo cliente en la base de datos
            $customerModel->insert($customerData);
            $customerId = $customerModel->getInsertID();
        } else {
            // Si el cliente existe, obtén su ID
            $customerId = $existingCustomer['id_customer'];
        }

        // Crea un registro de venta
        $saleModel = new Sale();
        $saleData = [
            'pay' => $this->request->getVar('pay'),
            'date' => date('Y-m-d'), // Fecha actual
            'id_user' => session('id_user'),
            'id_customer' => $customerId,
        ];

        $saleModel->insert($saleData);
        $saleId = $saleModel->getInsertID();

        // Procesa los detalles de venta (los productos en el carrito)
        $products = $this->request->getVar('id_product');
        $quantities = $this->request->getVar('quantity');
        $prices = $this->request->getVar('price');

        $saledetailModel = new Saledetail();

        foreach ($products as $key => $productId) {
            $detailData = [
                'id_sale' => $saleId,
                'id_product' => $productId,
                'quantity' => $quantities[$key],
                'price' => $prices[$key],
            ];

            $saledetailModel->insert($detailData);
        }

        // Limpia el carrito o la sesión del carrito aquí
        session()->remove('cart');

        session()->setFlashdata('alert-class', 'success');
        session()->setFlashdata('message', 'Compra realizada con éxito.');

        // Redirige a donde necesites después de almacenar la venta
        return redirect()->to(site_url('admin/sales/show/' . $saleId));
    }

    public function cancelCart()
    {
        session()->remove('cart');
        session()->setFlashdata('alert-class', 'success');
        session()->setFlashdata('message', 'Haz cancelado la compra, ya puedes iniciar otra');
        return redirect()->to(site_url('admin/sales/products'));
    }

    public function show($id_sale = 0)
    {
        $saleModel = new Sale();
        $sale = $saleModel->find($id_sale);

        $userModel = new User();
        $user = $userModel->find($sale['id_user']);

        $saledetailModel = new Saledetail();
        $saledetails = $saledetailModel->findAllWithProducts($id_sale);

        $total = 0;

        foreach ($saledetails as $detail) {
            // Asegúrate de que los campos 'price' y 'quantity' sean correctos
            $price = $detail['price'];
            $quantity = $detail['quantity'];

            // Realiza el cálculo y suma al total
            $total += $price * $quantity;
        }

        $customerModel = new Customer();
        $customer = $customerModel->find($sale['id_customer']);

        // Agregar el total al arreglo $sale
        $sale['total'] = $total;

        $data['sale'] = $sale;
        $data['user'] = $user;
        $data['saledetails'] = $saledetails;
        $data['customer'] = $customer;

        return view('admin/sales/show', $data);
    }

    public function myReports()
    {
        return view('admin/sales/myReports');
    }

    public function buscarVentasAjax()
    {
        $fechaDel = $this->request->getPost('del');
        $fechaAl = $this->request->getPost('al');

        $model = new Sale();

        $sales = $model->where('date >=', $fechaDel)->where('date <=', $fechaAl)->where('id_user', session('id_user'))->orderBy('date', 'DESC')->findAll();

        $salesDetailModel = new Saledetail();

        foreach ($sales as &$sale) {
            $details = $salesDetailModel->where('id_sale', $sale['id_sale'])->findAll();
            $total = 0;

            foreach ($details as $detail) {
                $total += $detail['price'] * $detail['quantity'];
            }

            $sale['total'] = $total;
        }

        /* $data['sales'] = $model
            ->where('date >=', $fechaDel)
            ->where('date <=', $fechaAl)
            ->where('id_user', session('id_user'))
            ->findAll(); */

        echo view('admin/sales/tablamisventas', ['sales' => $sales]); // Crea una vista "tabla_ventas.php" para mostrar la tabla
    }
    public function salesbydate()
    {
        return view('admin/sales/salesbydate');
    }
}
