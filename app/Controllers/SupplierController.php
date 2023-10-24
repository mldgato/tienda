<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Supplier;

class SupplierController extends BaseController
{
    public function index()
    {
        if (session('id_rol') == 1 || session('id_rol') == 3) {
            $suplierModel = new Supplier();
            $supliers = $suplierModel->where('state', 1)->orderBy('company', 'ASC')->findAll();
            $data['supliers'] = $supliers;
            return view('admin/suppliers/index', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function create()
    {
        if (session('id_rol') == 1 || session('id_rol') == 3) {
            return view('admin/suppliers/create');
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function store()
    {
        $validationRules = [
            'taxnumber' => 'required|integer|is_unique[suppliers.taxnumber]',
            'company' => 'required',
            'address' => 'required',
            'seller' => 'required',
            'email' => 'required|valid_email|is_unique[suppliers.email]',
            'phone' => 'required',
        ];
        if ($this->validate($validationRules)) {
            $request = service('request');
            $postData = $request->getPost();

            $suplierModel = new Supplier();

            $data = [
                'taxnumber' => $postData['taxnumber'],
                'company' => $postData['company'],
                'address' => $postData['address'],
                'seller' => $postData['seller'],
                'email' => $postData['email'],
                'phone' => $postData['phone'],
            ];

            if ($suplierModel->insert($data)) {
                session()->setFlashdata('message', 'Proveedor creado exitosamente');
                session()->setFlashdata('alert-class', 'success');
                $userId = $suplierModel->getInsertID();
                return redirect()->to(site_url('admin/suppliers/edit/' . $userId));
            } else {
                session()->setFlashdata('message', 'El proveedor no se ha guardado');
                session()->setFlashdata('alert-class', 'danger');
                return redirect()->to(site_url('admin/suppliers/create'));
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
    public function edit($id_supplier = 0)
    {
        if (session('id_rol') == 1 || session('id_rol') == 3) {
            $suplierModel = new Supplier();
            $supplier = $suplierModel->find($id_supplier);
            $data['supplier'] = $supplier;
            return view('admin/suppliers/edit', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function update($id_supplier = 0)
    {
        $suplierModel = new Supplier();
        $supplier = $suplierModel->find($id_supplier);
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            if ($postData['taxnumber'] == $supplier['taxnumber'] && $postData['email'] == $supplier['email']) {
                $validationRules = [
                    'company' => 'required',
                    'address' => 'required',
                    'seller' => 'required',
                    'phone' => 'required',
                ];
            } elseif ($postData['taxnumber'] == $supplier['taxnumber'] && $postData['email'] != $supplier['email']) {
                $validationRules = [
                    'company' => 'required',
                    'address' => 'required',
                    'seller' => 'required',
                    'email' => 'required|valid_email|is_unique[suppliers.email]',
                    'phone' => 'required',
                ];
            } elseif ($postData['taxnumber'] != $supplier['taxnumber'] && $postData['email'] == $supplier['email']) {
                $validationRules = [
                    'taxnumber' => 'required|integer|is_unique[suppliers.taxnumber]',
                    'company' => 'required',
                    'address' => 'required',
                    'seller' => 'required',
                    'phone' => 'required',
                ];
            } elseif ($postData['taxnumber'] != $supplier['taxnumber'] && $postData['email'] != $supplier['email']) {
                $validationRules = [
                    'taxnumber' => 'required|integer|is_unique[suppliers.taxnumber]',
                    'company' => 'required',
                    'address' => 'required',
                    'seller' => 'required',
                    'email' => 'required|valid_email|is_unique[suppliers.email]',
                    'phone' => 'required',
                ];
            }


            if ($this->validate($validationRules)) {

                $data = [
                    'taxnumber' => $postData['taxnumber'],
                    'company' => $postData['company'],
                    'address' => $postData['address'],
                    'seller' => $postData['seller'],
                    'email' => $postData['email'],
                    'phone' => $postData['phone'],
                ];

                if ($suplierModel->update($id_supplier, $data)) {
                    session()->setFlashdata('message', 'Proveedor actualizado exitosamente');
                    session()->setFlashdata('alert-class', 'success');
                    return redirect()->to(site_url('admin/suppliers/edit/' . $id_supplier));
                } else {
                    session()->setFlashdata('message', 'El proveedor no se ha actualizado');
                    session()->setFlashdata('alert-class', 'danger');
                }
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function delete($id_supplier = 0)
    {
        $suplierModel = new Supplier();
        $data = [
            'state' => 0
        ];
        if ($suplierModel->update($id_supplier, $data)) {
            session()->setFlashdata('message', 'Proveedor eliminado exitosamente');
            session()->setFlashdata('alert-class', 'success');
            return redirect()->to(site_url('admin/suppliers/index'));
        } else {
            session()->setFlashdata('message', 'El proveedor no se ha eliminado');
            session()->setFlashdata('alert-class', 'danger');
        }
    }
}
