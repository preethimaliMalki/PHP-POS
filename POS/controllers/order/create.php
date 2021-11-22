<?php

include_once '../../config/DBConnection.php';
include_once '../../models/Order.php';

$database = new DBConnection();
$db = $database->dbConnections();
$order = new Order($db);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $order->oid = $_POST['oid'];
    $order->CusID = $_POST['CusID'];
    $order->ItemCode = implode(",", $_POST['ItemCode']);
    $order->buy_qty = implode(",", $_POST['buy_qty']);
    $order->price = implode(",", $_POST['price']);
    if ($order->create()) {
        echo json_encode("Order Added Successfully");
    } else {
        echo json_encode("Order Could not be added");
    }
}
