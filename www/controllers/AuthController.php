<?php

require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends BaseController
{
    public function loginForm()
    {
        $this->view('auth/login');
    }

    public function login()
    {
        $user = (new User)->findByEmail($_POST['email']);

        if (!$user || !password_verify($_POST['password'], $user['password'])) {
            die('Credenciales inválidas');
        }

        $_SESSION['user'] = $user['id'];
        $this->redirect('/users');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }
}
