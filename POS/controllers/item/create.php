<?php
include_once '../../config/DBConnection.php';
include_once '../../models/Item.php';

$database = new DBConnection();
$db = $database->dbConnections();
$item = new Item($db);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $item->ItemCode = $_POST['ItemCode'];
    $item->ItemName = $_POST['ItemName'];
    $item->QTY = $_POST['QTY'];
    $item->UnitPrice = $_POST['UnitPrice'];
    if ($item->create()) {
        echo json_encode("Item Added Successfully");
    } else {
        echo json_encode("Item Could not be added");
    }
}
