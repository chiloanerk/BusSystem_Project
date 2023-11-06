<?php

namespace app\controllers\login;

use app\models\Database;
use app\models\Login;
use app\models\Parents;

class LoginController
{
    public string $title = 'SafeTrans -'; // I am just being fancy here

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
                        header('Location: /dashboard');
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
            'title' => $this->title . 'Login',
            'heading' => 'Login'
        ]);
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            view('login/signup', [
                'title' => $this->title . 'Signup',
                'heading' => 'Parent Registration'
            ]);
        } else {
            if (isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $_POST['cellphone'])) {
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cellphone = intval($_POST['cellphone']);

                $db = new Database();
                $parentsModel = new Parents($db);

                $parentsModel->setName($name);
                $parentsModel->setSurname($surname);
                $parentsModel->setEmail($email);
                $parentsModel->setPassword($password);
                $parentsModel->setCellphone($cellphone);

                if ($parentsModel->save()) {
                    session_start();
                    $_SESSION['message'] = 'Registration Successful. Login using your registered email and password';
                    header('Location: /login');
                } else {
                    $_SESSION['error'] = "Failed to register parent";
                    header('Location: /signup');
                }
            } else {
                $_SESSION['error'] = "Missing required fields";
                header('Location: /signup');
            }
        }
    }
}