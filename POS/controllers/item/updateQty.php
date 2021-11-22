<?php
include_once '../../config/DBConnection.php';
include_once '../../models/Item.php';

$database = new DBConnection();
$db = $database->dbConnections();
$item = new Item($db);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $item->QTY = $_POST['qty'];
    $item->ItemCode = $_POST['ItemCode'];
    if ($item->updateQty()) {
        echo json_encode("Item Quantity Updated");
    } else {
        echo json_encode("Item Quantity Could not be updated");
    }
}
