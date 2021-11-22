<?php
include_once '../../config/DBConnection.php';
include_once '../../models/Item.php';

$database = new DBConnection();
$db = $database->dbConnections();

$item = new Item($db);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $item->ItemCode = $_POST['ItemCode'];
    $result = $item->delete();
    if ($result) {
        echo json_encode("This Item Deleted");
    } else {
        echo json_encode("Item could not be deleted");
    }
}
