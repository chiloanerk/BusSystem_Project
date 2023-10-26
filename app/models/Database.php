<?php

namespace app\models;

use PDO;

class Database
{
    private $host = 'localhost';
    private $username = 'webmaster';
    private $password = 'password';
    private $database = 'SafeTrans';
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $this->pdo = new PDO($dsn, $this->username, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function close()
    {
        $this->pdo = null;
    }
}