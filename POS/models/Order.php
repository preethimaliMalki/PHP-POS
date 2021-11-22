<?php
class Order
{
    private $connection;
    public $oid;
    public $CusID;
    public $ItemCode;
    public $buy_qty;
    public $price;
    public $date;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function create()
    {
        $query = 'INSERT INTO orders SET oid=:id,CusID=:cid,ItemCode=:itemId,buy_qty=:qty,price=:price,date=NOW()';
        $createOrder = $this->connection->prepare($query);

        $createOrder->bindParam('id', $this->oid);
        $createOrder->bindParam('cid', $this->CusID);
        $createOrder->bindParam('itemId', $this->ItemCode);
        $createOrder->bindParam('qty', $this->buy_qty);
        $createOrder->bindParam('price', $this->price);

        if ($createOrder->execute()) {
            return true;
        }
        printf("Error: %s.\n", $createOrder->error);
        return false;
    }

    public function read()
    {
        $query = 'SELECT * FROM orders';
        $readOrder = $this->connection->prepare($query);
        $readOrder->execute();
        return $readOrder;
    }
}
