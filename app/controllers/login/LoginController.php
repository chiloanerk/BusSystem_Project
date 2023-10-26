<?php

namespace app\controllers\login;

use app\models\Database;
use app\models\Login;

class LoginController
{
    public string $title = 'SafeTrans - Login';
    public string $heading = 'Login';
    public function login()
    {
        if (isset($_POST['email'], $_POST['password'], $_POST['role'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $db = new Database();
            $login = new Login($db);

            if ($login->authenticateUser($email, $password, $role)) {
                switch ($role) {
                    case 'parent':
                        $_SESSION['role'] = $role;
                        header('Location: /application');
                        break;
                    case 'admin':
                        $_SESSION['role'] = $role;
                        header('Location: /panel');
                        break;
                    default:
                        // Invalid role.
                        $_SESSION['error'] = 'Invalid role.';
                        header('Location: /login');
                        break;
                }
            } else {
                $_SESSION['error'] = 'Invalid password or email.';
                header('Location: /login');
                exit();
            }
        }
        view('login/login', [
            'title' => $this->title,
            'heading' => $this->heading,
        ]);
    }
}