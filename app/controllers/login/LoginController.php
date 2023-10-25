<?php

namespace app\controllers\login;

class LoginController
{
    public string $title = 'SafeTrans - Login';
    public function parentLogin()
    {
        $heading = 'Parent Login';
        $action = 'login';
        $role = 'Parent';

        view('login/login', [
            'title' => $this->title,
            'heading' => $heading,
            'action' => $action,
            'role' => $role
        ]);
    }

    public function admin()
    {
        $heading = 'Admin Login';
        $action = 'admin';
        $role = 'Admin';

        view('login/login', [
            'title' => $this->title,
            'heading' => $heading,
            'action' => $action,
            'role' => $role
        ]);
    }
}