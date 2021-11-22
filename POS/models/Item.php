<?php
class Item
{
    private $connection;
    public $ItemCode;
    public $ItemName;
    public $QTY;
    public $UnitPrice;

    public function __construct($db)
    {
        $this->connection = $db;
    }
    public function read()
    {
        $query = 'SELECT * FROM item';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $query = 'INSERT INTO item SET ItemCode=:id,ItemName=:name,QTY=:qty,UnitPrice=:price';
        $createItem = $this->connection->prepare($query);

        $createItem->bindParam('id', $this->ItemCode);
        $createItem->bindParam('name', $this->ItemName);
        $createItem->bindParam('qty', $this->QTY);
        $createItem->bindParam('price', $this->UnitPrice);

        if ($createItem->execute()) {
            return true;
        }
        printf("Error: %s.\n", $createItem->error);
        return false;
    }

    public function update()
    {
        $query = "UPDATE item SET ItemName=:name, QTY=:qty,UnitPrice=:price WHERE ItemCode = :id";

        $updateItem = $this->connection->prepare($query);

        $updateItem->bindParam('name', $this->ItemName);
        $updateItem->bindParam('qty', $this->QTY);
        $updateItem->bindParam('price', $this->UnitPrice);
        $updateItem->bindParam('id', $this->ItemCode);

        if ($updateItem->execute()) {
            return true;
        }
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM item WHERE ItemCode=?";
        $deleteItem = $this->connection->prepare($query);
        $deleteItem->bindParam(1, $this->ItemCode);
        if ($deleteItem->execute()) {
            return true;
        }
        return false;
    }

    public function search()
    {
        $query = 'SELECT ItemName,QTY,UnitPrice,ItemCode FROM item WHERE ItemCode=? LIMIT 0,1 ';
        $searchItem = $this->connection->prepare($query);
        $searchItem->bindParam(1, $this->ItemCode);
        $searchItem->execute();
        return $searchItem;
    }
    public function updateQty()
    {
        $queryQty = 'UPDATE item SET QTY=:qty WHERE ItemCode = :id ';
        $updateItem = $this->connection->prepare($queryQty);
        $updateItem->bindParam('qty', $this->QTY);
        $updateItem->bindParam('id', $this->ItemCode);

        if ($updateItem->execute()) {
            return true;
        }
        return false;
    }
}
