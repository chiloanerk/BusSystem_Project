<?php

namespace app\models;

use PDO;

class Bus
{
    protected PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    public function getBuses()
    {
        $sql = "SELECT * FROM bus";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getBusRoute($bus_num)
    {
        $sql = "SELECT route FROM bus WHERE id = :bus_num";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_num', $bus_num);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getCapacity($bus_num)
    {
        $sql = "SELECT capacity FROM bus WHERE id = :bus_num";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_num', $bus_num);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAmount($bus_id)
    {
        $sql = 'SELECT ticket_price FROM bus WHERE id = :bus_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->execute();

        $price = $stmt->fetchColumn();
        return $price;
    }
}