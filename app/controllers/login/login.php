<?php

use app\models\Database;
use app\models\Login;
use app\controllers\login\LoginController;

$db = new Database();
$loginController = new LoginController();
$loginController->parentLogin();

// Grab the POST data from the login form
if (isset($_POST['email'], $_POST['password'], $_POST['role'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

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
                addError('Invalid role.');
                header('Location: /login');
                break;
        }
    } else {
        addError('Invalid password or email.');
        header('Location: /login');
    }
}