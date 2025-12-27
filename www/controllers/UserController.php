<?php

require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../helpers/csrf.php';

class UserController extends BaseController
{
    public function index()
    {
        auth_required();
        $users = (new User)->all();
        $this->view('users/index', compact('users'));
    }

    public function show($id)
    {
        auth_required();
        $user = (new User)->find($id);
        $this->view('users/show', compact('user'));
    }

    public function create()
    {
        // auth_required();
        $this->view('users/create');
    }

    public function store()
    {
        // auth_required();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /users/create');
            exit;
        }

        $user = new User();

        if (!$user->create($_POST)) {
            $_SESSION['error'] = 'Datos inválidos o email duplicado';
            header('Location: /users/create');
            exit;
        }

        header('Location: /users');
    }

}
