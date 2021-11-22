<?php

include_once '../../config/DBConnection.php';
include_once '../../models/Item.php';

$database = new DBConnection();
$db = $database->dbConnections();

$item = new Item($db);

$result = $item->read();
$num = $result->rowCount();

if ($num > 0) {
    $item_arr = array();
    $item_arr['item'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $getItem = array(
            'ItemCode' => $ItemCode,
            'ItemName' => $ItemName,
            'QTY' => $QTY,
            'UnitPrice' => $UnitPrice
        );
        array_push($item_arr['item'], $getItem);
    }
    echo json_encode($item_arr['item']);
} else {
    echo json_encode('No Data Found');
}
