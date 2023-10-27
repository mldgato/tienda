<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Rol;

class RolController extends BaseController
{
    public function index()
    {
        if (session('id_rol') == 1) {
            $rolModel = new Rol();
            $roles = $rolModel->orderBy('id_rol', 'ASC')->findAll();
            $data['roles'] = $roles;
            return view('admin/roles/index', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function create()
    {
        return view('admin/roles/create');
    }

    public function store()
    {
        $validationRules = [
            'rolname' => 'required|is_unique[roles.rolname]'
        ];
        if ($this->validate($validationRules)) {
            $request = service('request');
            $postData = $request->getPost();

            $rolModel = new Rol();

            $data = [
                'rolname' => $postData['rolname']
            ];

            if ($rolModel->insert($data)) {
                session()->setFlashdata('message', 'Rol creado exitosamente');
                session()->setFlashdata('alert-class', 'success');
                $userId = $rolModel->getInsertID();
                return redirect()->to(site_url('admin/roles/edit/' . $userId));
            } else {
                session()->setFlashdata('message', 'El rol no se ha guardado');
                session()->setFlashdata('alert-class', 'danger');
                return redirect()->to(site_url('admin/roles/create'));
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id_rol = 0)
    {
        $rolModel = new Rol();
        $rol = $rolModel->find($id_rol);
        $data['rol'] = $rol;
        return view('admin/roles/edit', $data);
    }

    public function update($id_rol = 0)
    {
        $rolModel = new Rol();
        $rol = $rolModel->find($id_rol);
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            $validationRules = [
                'rolname' => 'required|is_unique[roles.rolname]'
            ];


            if ($this->validate($validationRules)) {

                $data = [
                    'rolname' => $postData['rolname']
                ];

                if ($rolModel->update($id_rol, $data)) {
                    session()->setFlashdata('message', 'Rol actualizado exitosamente');
                    session()->setFlashdata('alert-class', 'success');
                    return redirect()->to(site_url('admin/roles/edit/' . $id_rol));
                } else {
                    session()->setFlashdata('message', 'El rol no se ha actualizado');
                    session()->setFlashdata('alert-class', 'danger');
                }
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }
}
