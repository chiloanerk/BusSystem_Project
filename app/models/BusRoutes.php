<?php

namespace app\models;

use PDO;

class BusRoutes
{
    protected PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    public function getRoutesByBus($bus)
    {
        $sql = "SELECT * FROM routes WHERE bus_num = :bus_num";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_num', $bus);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPickup($pickup_num)
    {
        $sql = "SELECT pickup_name, pickup_time FROM routes WHERE pickup_num = :pickup_num";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':pickup_num', $pickup_num);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getDropoff($dropoff_num)
    {
        $sql = "SELECT dropoff_name, dropoff_time FROM routes WHERE dropoff_num = :dropoff_num";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':dropoff_num', $dropoff_num);
        $stmt->execute();
        return $stmt->fetch();
    }
}