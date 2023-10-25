<?php
 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Supplier;

class ProductController extends BaseController
{
    public function index()
    {
        if (session('id_rol') == 1 || session('id_rol') == 3) {
            $productModel = new Product();
            $products = $productModel->findAllWithSupplier();
            $data['products'] = $products;
            return view('admin/products/index', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function create()
    {
        if (session('id_rol') == 1 || session('id_rol') == 3) {
            $supplierModel = new Supplier();
            $suppliers = $supplierModel->findAll();
            $data['suppliers'] = $suppliers;
            return view('admin/products/create', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function store()
    {
        $validationRules = [
            'cod' => 'required|integer|is_unique[products.cod]',
            'product_name' => 'required',
            'brand' => 'required',
            'quantity' => 'required|integer',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'id_supplier' => 'required|integer'
        ];
        if ($this->validate($validationRules)) {
            $request = service('request');
            $postData = $request->getPost();

            $productModel = new Product();

            $data = [
                'cod' => $postData['cod'],
                'product_name' => $postData['product_name'],
                'brand' => $postData['brand'],
                'quantity' => $postData['quantity'],
                'cost' => $postData['cost'],
                'price' => $postData['price'],
                'id_supplier' => $postData['id_supplier'],
            ];

            if ($productModel->insert($data)) {
                session()->setFlashdata('message', 'Producto creado exitosamente');
                session()->setFlashdata('alert-class', 'success');
                $Id = $productModel->getInsertID();
                return redirect()->to(site_url('admin/products/edit/' . $Id));
            } else {
                session()->setFlashdata('message', 'El producto no se ha guardado');
                session()->setFlashdata('alert-class', 'danger');
                return redirect()->to(site_url('admin/products/create'));
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id_product = 0)
    {
        if (session('id_rol') == 1 || session('id_rol') == 3) {
            $productModel = new Product();
            $product = $productModel->find($id_product);
            $data['product'] = $product;

            $supplierModel = new Supplier();
            $suppliers = $supplierModel->findAll();
            $data['suppliers'] = $suppliers;

            return view('admin/products/edit', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function update($id_product = 0)
    {
        $productModel = new Product();
        $product = $productModel->find($id_product);
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            if ($postData['cod'] == $product['cod']) {
                $validationRules = [
                    'product_name' => 'required',
                    'brand' => 'required',
                    'quantity' => 'required|integer',
                    'cost' => 'required|numeric',
                    'price' => 'required|numeric',
                    'id_supplier' => 'required|integer'
                ];
            } else {
                $validationRules = [
                    'cod' => 'required|integer|is_unique[products.cod]',
                    'product_name' => 'required',
                    'brand' => 'required',
                    'quantity' => 'required|integer',
                    'cost' => 'required|numeric',
                    'price' => 'required|numeric',
                    'id_supplier' => 'required|integer'
                ];
            }

            if ($this->validate($validationRules)) {

                $data = [
                    'cod' => $postData['cod'],
                    'product_name' => $postData['product_name'],
                    'brand' => $postData['brand'],
                    'quantity' => $postData['quantity'],
                    'cost' => $postData['cost'],
                    'price' => $postData['price'],
                    'id_supplier' => $postData['id_supplier'],
                ];

                if ($productModel->update($id_product, $data)) {
                    session()->setFlashdata('message', 'Producto actualizado exitosamente');
                    session()->setFlashdata('alert-class', 'success');
                    return redirect()->to(site_url('admin/products/edit/' . $id_product));
                } else {
                    session()->setFlashdata('message', 'El producto no se ha actualizado');
                    session()->setFlashdata('alert-class', 'danger');
                }
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function uploadImage_action($id_product)
    {
        $productModel = new Product();
        $product = $productModel->find($id_product);

        if ($this->request->getFile('image')->isValid()) {
            $file = $this->request->getFile('image');
            if ($file->getClientExtension() === 'jpg' || $file->getClientExtension() === 'png') {
                if ($file->getSize() <= 10 * 1024 * 1024) {
                    $newName = $file->getRandomName();

                    $file->move(ROOTPATH . 'public/dist/img/products', $newName, true);

                    // Verifica si el usuario tenía una imagen anterior
                    if (!empty($product['image'])) {
                        // Elimina la imagen anterior si existe
                        unlink(ROOTPATH . 'public/dist/img/products/' . $product['image']);
                    }

                    $data = [
                        'image' => $newName
                    ];
                    if ($productModel->update($id_product, $data)) {
                        $info = $this->generateSessionInfo('¡La imagen se ha actualizado con éxito!', 'success');
                    } else {
                        $info = $this->generateSessionInfo('¡No se guardó la imagen!', 'error');
                    }
                } else {
                    $info = $this->generateSessionInfo('El archivo es demasiado grande', 'error');
                }
            } else {
                $info = $this->generateSessionInfo('El tipo de archivo no es compatible', 'error');
            }
        } else {
            // No se proporcionó una nueva imagen, solo actualiza la información del usuario
            if ($productModel->update($id_product, [])) {
                $info = $this->generateSessionInfo('La información del usuario se ha actualizado con éxito.', 'success');
            } else {
                $info = $this->generateSessionInfo('¡No se guardó la información del usuario!', 'error');
            }
        }

        $session = session();
        $session->set($info);

        return redirect()->to('admin/products/edit/' . $id_product);
    }

    // Función privada para generar información de sesión
    private function generateSessionInfo($message, $alertClass)
    {
        return [
            'message' => $message,
            'alert-class' => $alertClass,
        ];
    }

    public function delete($id_product = 0)
    {
        $productModel = new Product();
        $data = [
            'state' => 0
        ];
        if ($productModel->update($id_product, $data)) {
            session()->setFlashdata('message', 'Producto eliminado exitosamente');
            session()->setFlashdata('alert-class', 'success');
            return redirect()->to(site_url('admin/products/index'));
        } else {
            session()->setFlashdata('message', 'El producto no se ha eliminado');
            session()->setFlashdata('alert-class', 'danger');
        }
    }
}
