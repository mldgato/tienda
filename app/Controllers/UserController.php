<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Rol;


class UserController extends BaseController
{
    public function index()
    {
        //
    }

    public function show($id_user = 0)
    {
        $userModel = new User();
        $user = $userModel->find($id_user);
        $data['user'] = $user;

        $rolModel = new Rol();
        $roles = $rolModel->findAll();
        $data['roles'] = $roles;

        return view('admin/users/show', $data);
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
                    $file->move(ROOTPATH . 'public/dist/img/users', $newName, true);

                    // Verifica si el usuario tenía una imagen anterior
                    if (!empty($user['image'])) {
                        // Elimina la imagen anterior si existe
                        unlink(ROOTPATH . 'public/dist/img/users/' . $user['image']);
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
        $session->set('image', $newName);
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
}
