<?php

namespace app\models;

use Exception;
use PDO;

class BusRegistration
{
    private int $id;
    private int $parent_id;
    private int $learner_id;
    private int $bus_id;
    private string $pickup_num;
    private string $dropoff_num;
    private string $status;
    protected PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    public function get_id(): int
    {
        return $this->id;
    }

    public function setParent_id($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    public function getLearner_id(): int
    {
        return $this->learner_id;
    }

    public function setLearner_id($learner_id)
    {
        $this->learner_id = $learner_id;
    }

    public function getBus_id(): int
    {
        return $this->bus_id;
    }

    public function setBus_id($bus_id)
    {
        $this->bus_id = $bus_id;
    }

    public function getPickup_num(): string
    {
        return $this->pickup_num;
    }

    public function setPickup_num($pickup_num)
    {
        $this->pickup_num = $pickup_num;
    }

    public function getDropoff_num(): string
    {
        return $this->dropoff_num;
    }

    public function setDropoff_num($dropoff_num)
    {
        $this->dropoff_num = $dropoff_num;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getRegistrationsPerBus($bus_id)
    {
        $sql = "SELECT COUNT(registration_id) FROM registrations WHERE bus_id = :bus_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function availableSeats($busNumber)
    {
        $db = new Database();
        $bus = new Bus($db);

        $capacity = $bus->getCapacity($busNumber);
        $currentBusCapacity = $this->getRegistrationsPerBus($busNumber);
        return $capacity['capacity'] - $currentBusCapacity;

    }

    public function save()
    {
        $sql = "INSERT INTO registrations (parent_id, learner_id, bus_id, pickup_num, dropoff_num, status)
                VALUES (:parent_id, :learner_id, :bus_id, :pickup_num, :dropoff_num, :status)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':parent_id', $this->parent_id);
        $stmt->bindParam(':learner_id', $this->learner_id);
        $stmt->bindParam(':bus_id', $this->bus_id);
        $stmt->bindParam(':pickup_num', $this->pickup_num);
        $stmt->bindParam(':dropoff_num', $this->dropoff_num);
        $stmt->bindParam(':status', $this->status);
        if ($stmt->execute()) {
            return true;
        }
    }


    public function getRegistrationByLearnerId($learner_id)
    {
        $sql = "SELECT * FROM registrations WHERE learner_id = :learner_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':learner_id', $learner_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getRegistrationByParentId($parent_id)
    {
        $sql = "SELECT * FROM registrations WHERE parent_id = :parent_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':parent_id', $parent_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getRegistrationCountPerParent($parent_id)
    {
        $sql = 'SELECT COUNT(registration_id) FROM registrations WHERE parent_id = :parent_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':parent_id', $parent_id);
        $stmt->execute();

        $count = (int)$stmt->fetchColumn();
        return $count;
    }

    public function getRegistrationsByStatus($status)
    {
        $sql = "SELECT * FROM registrations WHERE status = :status";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getWaitingListByBus($bus_num)
    {
        $sql = "SELECT * FROM registrations WHERE status = 'pending' AND bus_id = :bus_num";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_num', $bus_num);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function approveRegistration($learner_id)
    {
        $sql = "UPDATE registrations SET status  = 'approved' WHERE learner_id = :learner_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':learner_id', $learner_id);
        $stmt->execute();
        return true;
    }


    public function getByBus($bus_num)
    {
        $sql = "SELECT * FROM registrations WHERE bus_id = :bus_num";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_num', $bus_num);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getThisWeek()
    {
        $sql = "SELECT COUNT(registration_id) FROM registrations WHERE date >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK )";
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getWeeklyMorningCount($bus_id)
    {
        $sql = "SELECT
    bus_id,
    SUM(CASE WHEN pickup_num != '' THEN 1 ELSE 0 END) AS morning_trip_count
FROM registrations
WHERE date >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
    AND bus_id = :bus_id
GROUP BY bus_id;
";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getWeeklyAfternoonCount($bus_id)
    {
        $sql = "SELECT
    bus_id,
    SUM(CASE WHEN dropoff_num != '' THEN 1 ELSE 0 END) AS afternoon_trip_count
FROM registrations
WHERE date >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
  AND bus_id = :bus_id
GROUP BY bus_id;
";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':bus_id', $bus_id);
        $stmt->execute();
        return $stmt->fetch();
    }



}