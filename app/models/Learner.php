<?php

namespace app\models;

use PDO;

class Learner
{
    private int $id;
    private string $name;
    private string $surname;
    private int $cellphone;
    private int $grade;
    private int $parent_id;
    protected PDO $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->getPdo();
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function setId($learner_id)
    {
        $this->id = $learner_id;
    }

    public function setParent_id($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }


    public function getCellphone(): int
    {
        return $this->cellphone;
    }

    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    public function getGrade(): int
    {
        return $this->grade;
    }
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    public function getParent($learner_id)
    {
        $sql = 'SELECT parent.name, parent.surname, parent.email FROM learner Join parent ON learner.parent_id = parent.id WHERE learner.id = :learner_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':learner_id', $learner_id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function save()
    {
        $sql = 'INSERT INTO learner (name, surname, cellphone, grade, parent_id) VALUES (:name, :surname, :cellphone, :grade, :parent_id)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':surname', $this->surname);
        $stmt->bindParam(':cellphone', $this->cellphone);
        $stmt->bindParam(':grade', $this->grade);
        $stmt->bindParam(':parent_id', $this->parent_id);
        $stmt->execute();

        $this->id = $this->pdo->lastInsertId();
    }

    public function update()
    {
        $sql = 'UPDATE learner SET name = :name, surname = :surname, cellphone = :cellphone, grade = :grade WHERE id = :learner_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':surname', $this->surname);
        $stmt->bindParam(':cellphone', $this->cellphone);
        $stmt->bindParam(':grade', $this->grade);
        $stmt->bindParam(':learner_id', $this->id);
        $stmt->execute();
    }

    public function getLearner($learner_id)
    {
        $sql = "SELECT * FROM learner WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $learner_id);
        $stmt->execute();
        return $stmt->fetch();
    }

}