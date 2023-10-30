<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Rol;


class UserController extends BaseController
{
    public function index()
    {
        if (session('id_rol') == 1) {
            $userModel = new User();
            $users = $userModel->findAllWithRoles();
            $data['users'] = $users;
            return view('admin/users/index', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function create()
    {
        $rolModel = new Rol();
        $roles = $rolModel->findAll();
        $data['roles'] = $roles;
        return view('admin/users/create', $data);
    }

    public function store()
    {
        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required',
            'repeat' => 'required|matches[password]',
            'id_rol' => 'required|integer'
        ];
        if ($this->validate($validationRules)) {
            $request = service('request');
            $postData = $request->getPost();

            $userModel = new User();
            $password = password_hash($postData['password'], PASSWORD_DEFAULT);

            $data = [
                'name' => $postData['name'],
                'email' => $postData['email'],
                'password' => $password,
                'id_rol' => $postData['id_rol'],
            ];

            if ($userModel->insert($data)) {
                session()->setFlashdata('message', 'Usuario creado exitosamente');
                session()->setFlashdata('alert-class', 'success');
                $userId = $userModel->getInsertID();
                return redirect()->to(site_url('admin/users/show/' . $userId));
            } else {
                session()->setFlashdata('message', 'El integrante no se ha guardado');
                session()->setFlashdata('alert-class', 'danger');
                return redirect()->to(site_url('admin/users/create'));
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function show($id_user = 0)
    {
        if ($id_user == session('id_user') || session('id_rol') == 1) {
            $userModel = new User();
            $user = $userModel->find($id_user);
            $data['user'] = $user;

            $rolModel = new Rol();
            $roles = $rolModel->findAll();
            $data['roles'] = $roles;

            return view('admin/users/show', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function uploadImage_action($id_user)
    {
        $userModel = new User();
        $user = $userModel->find($id_user);

        if ($this->request->getFile('image')->isValid()) {
            $file = $this->request->getFile('image');
            if ($file->getClientExtension() === 'jpg' || $file->getClientExtension() === 'png') {
                if ($file->getSize() <= 10 * 1024 * 1024) {
                    $newName = $file->getRandomName();
                    if ($id_user == session('id_user')) {
                        $session = session();
                        $session->set('image', $newName);
                    }
                    $file->move(ROOTPATH . 'public/dist/img/users', $newName, true);

                    // Verifica si el usuario tenía una imagen anterior
                    if (!empty($user['image'])) {
                        $imagePath = ROOTPATH . 'public/dist/img/users/' . $user['image'];
                        if(file_exists($imagePath))
                        {
                            unlink($imagePath);
                        }
                    }

                    $data = [
                        'image' => $newName
                    ];
                    if ($userModel->update($id_user, $data)) {
                        $info = $this->generateSessionInfo('¡La imagen se ha actualizado con éxito!', 'success');
                    } else {
                        $info = $this->generateSessionInfo('¡La no se guardó la imagen!', 'error');
                    }
                } else {
                    $info = $this->generateSessionInfo('El archivo es demasiado grande', 'error');
                }
            } else {
                $info = $this->generateSessionInfo('El tipo de archivo no es compatible', 'error');
            }
        } else {
            // No se proporcionó una nueva imagen, solo actualiza la información del usuario
            if ($userModel->update($id_user, [])) {
                $info = $this->generateSessionInfo('La información del usuario se ha actualizado con éxito.', 'success');
            } else {
                $info = $this->generateSessionInfo('¡No se guardó la información del usuario!', 'error');
            }
        }

        $session = session();
        $session->set($info);

        return redirect()->to('admin/users/show/' . $id_user);
    }

    // Función privada para generar información de sesión
    private function generateSessionInfo($message, $alertClass)
    {
        return [
            'message' => $message,
            'alert-class' => $alertClass,
        ];
    }

    public function update($id_user = 0)
    {
        $userModel = new User();
        $user = $userModel->find($id_user);
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            if ($postData['email'] == $user['email']) {
                $validationRules = [
                    'name' => 'required',
                    'id_rol' => 'required|integer',
                ];
            } else {
                $validationRules = [
                    'name' => 'required',
                    'email' => 'required|valid_email|is_unique[users.email]',
                    'id_rol' => 'required|integer',
                ];
            }


            if ($this->validate($validationRules)) {

                $data = [
                    'name' => $postData['name'],
                    'email' => $postData['email'],
                    'id_rol' => $postData['id_rol']
                ];

                if ($userModel->update($id_user, $data)) {
                    session()->setFlashdata('message', 'Usuario actualizado exitosamente');
                    session()->setFlashdata('alert-class', 'success');
                    return redirect()->to(site_url('admin/users/show/' . $id_user));
                } else {
                    session()->setFlashdata('message', 'El usuario no se ha actualizado');
                    session()->setFlashdata('alert-class', 'danger');
                }
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function updatePass($id_user = 0)
    {
        $userModel = new User();
        $request = service('request');
        $postData = $request->getPost();
        if (isset($postData['submitPass'])) {
            $validationRules = [
                'password' => 'required',
                'repeat' => 'required|matches[password]',
            ];
            if ($this->validate($validationRules)) {
                $password = password_hash($postData['password'], PASSWORD_DEFAULT);
                $data = [
                    'password' => $password
                ];

                if ($userModel->update($id_user, $data)) {
                    session()->setFlashdata('message', 'Usuario actualizado exitosamente');
                    session()->setFlashdata('alert-class', 'success');
                    return redirect()->to(site_url('admin/users/show/' . $id_user));
                } else {
                    session()->setFlashdata('message', 'El usuario no se ha actualizado');
                    session()->setFlashdata('alert-class', 'danger');
                }
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function delete($id_user = 0)
    {
        $userModel = new User();
        $data = [
            'state' => 0
        ];
        if ($userModel->update($id_user, $data)) {
            session()->setFlashdata('message', 'Usuario eliminado exitosamente');
            session()->setFlashdata('alert-class', 'success');
            return redirect()->to(site_url('admin/users/index'));
        } else {
            session()->setFlashdata('message', 'El usuario no se ha eliminado');
            session()->setFlashdata('alert-class', 'danger');
        }
    }
}
