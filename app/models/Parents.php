<?php

namespace app\models;

use PDO;

class Parents
{
    private int $id;
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private int $cellphone;
    private PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getCellphone()
    {
        return $this->cellphone;
    }

    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    public function save()
    {
        $sql = 'INSERT INTO parent (name, surname, password, email, cellphone) VALUES (:name, :surname, :password, :email, :cellphone)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':surname', $this->surname);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cellphone', $this->cellphone);

        if ($stmt->execute()) {
            $this->id = $this->pdo->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function getParentInfo($parent_id)
    {
        $sql = "SELECT * FROM parent WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $parent_id);
        $stmt->execute();
        return $stmt->fetch();
    }
}