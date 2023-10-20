<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
    public function index(): string
    {
        $message = session('message');
        return view('login', ['message' => $message]);
    }

    public function inicio()
    {
        return view('admin/index');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $users = new User();

        $datosUsuario = $users->getUser(['email' => $email]);
        if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password'])) {
            $data = [
                'name' => $datosUsuario[0]['name'],
                'email' => $datosUsuario[0]['email'],
                'image' => $datosUsuario[0]['image'],
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
