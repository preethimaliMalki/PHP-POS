<?php

class DBConnection
{
    private $host = 'localhost';
    private $db_name = 'mp_pos';
    private $username = 'root';
    private $password = '1234';
    private $connection;

    public function  dbConnections()
    {
        $this->connection = null;
        try {
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->connection;
    }
}
