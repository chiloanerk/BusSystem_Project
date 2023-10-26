<?php

namespace app\models;

class Login
{
    private $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    // Makes more sense to use one method and just change the table, so yeah...
    public function authenticateUser(string $email, string $password, string $table) :bool
    {
        $sql = "SELECT * FROM $table WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch();
        if ($user) {
            $storedPassword = $user['password'];
            if ($password === $storedPassword) {
                session_start();
                $_SESSION['parent_id'] = $user['id'];
                return true;
            }
        }
        return false;
    }

    // Authenticate the parent form
    public function authenticateParent(string $email, string $password): bool
    {
        return $this->authenticateUser($email, $password, 'parent');
    }

    // Authenticate the admin form
    public function authenticateAdmin(string $email, string $password): bool
    {
        return $this->authenticateUser($email, $password, 'admin');
    }
}