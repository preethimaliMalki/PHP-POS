<?php
include_once '../../config/DBConnection.php';
include_once '../../models/Item.php';

$database = new DBConnection();
$db = $database->dbConnections();

$item = new Item($db);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $item->ItemCode = $_POST['ItemCode'];
    $result = $item->search();

    if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $getItem = array(
            'ItemCode' => $ItemCode,
            'ItemName' => $ItemName,
            'QTY' => $QTY,
            'UnitPrice' => $UnitPrice
        );
        echo json_encode($getItem);
    } else {
        echo json_encode('Data Not Found');
    }
}
