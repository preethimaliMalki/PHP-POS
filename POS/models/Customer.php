<?php

class Customer
{
    private $connection;
    public $CusID;
    public $Name;
    public $Address;
    public $Salary;

    public function __construct($db)
    {
        $this->connection = $db;
    }
    public function read()
    {

        $query = 'SELECT * FROM customer ';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $query = 'INSERT INTO customer SET CusID=:id,Name=:name,Address=:address,Salary=:salary';
        $createCus = $this->connection->prepare($query);

        $createCus->bindParam('id', $this->CusID);
        $createCus->bindParam('name', $this->Name);
        $createCus->bindParam('address', $this->Address);
        $createCus->bindParam('salary', $this->Salary);

        if ($createCus->execute()) {
            return true;
        }
        printf("Error: %s.\n", $createCus->error);
        return false;
    }

    public function update()
    {
        $query = "UPDATE customer SET Name = :name, Address = :address,Salary=:salary WHERE CusID = :id";

        $updateCus = $this->connection->prepare($query);

        $updateCus->bindParam('name', $this->Name);
        $updateCus->bindParam('address', $this->Address);
        $updateCus->bindParam('salary', $this->Salary);
        $updateCus->bindParam('id', $this->CusID);

        if ($updateCus->execute()) {
            return true;
        }
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM customer WHERE CusID=?";
        $deleteCus = $this->connection->prepare($query);
        $deleteCus->bindParam(1, $this->CusID);
        if ($deleteCus->execute()) {
            return true;
        }
        return false;
    }

    public function search()
    {
        $query = 'SELECT Name,Address,Salary,CusID FROM customer WHERE CusID=? LIMIT 0,1 ';
        $searchCus = $this->connection->prepare($query);
        $searchCus->bindParam(1, $this->CusID);
        $searchCus->execute();
        return $searchCus;
    }
}
