<?php

namespace app\classes;

class Login
{
    private $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    public function authenticateParent($email, $password)
    {

    }
}