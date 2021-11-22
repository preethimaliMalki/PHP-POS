<?php

include_once '../../config/DBConnection.php';
include_once '../../models/Item.php';

$database = new DBConnection();
$db = $database->dbConnections();
$item = new Item($db);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $item->ItemName = $_POST['ItemName'];
    $item->QTY = $_POST['QTY'];
    $item->UnitPrice = $_POST['UnitPrice'];
    $item->ItemCode = $_POST['ItemCode'];
    if ($item->update()) {
        echo json_encode("Item Updated");
    } else {
        echo json_encode("Item Could not be updated");
    }
}
