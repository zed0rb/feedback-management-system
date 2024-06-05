<?php
declare(strict_types=1);
class Database
{
    private ?PDO $conn = null;
    private array $config;

    public function __construct()
    {
        $this->config = require(__DIR__ . '/../config/config.php');
    }

    public function connect(): ?PDO
    {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    'mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['db_name'],
                    $this->config['username'],
                    $this->config['password']
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}
