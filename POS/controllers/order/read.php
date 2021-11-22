<?php
include_once "../../config/DBConnection.php";
include_once "../../models/Order.php";

$database = new DBConnection();
$db = $database->dbConnections();
$order = new Order($db);

$result = $order->read();
$num = $result->rowCount();

if ($num > 0) {
    $or_arr = array();
    $or_arr['order'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $getOrder = array(
            'oid' => $oid,
            'CusID' => $CusID,
            'ItemCode' => $ItemCode,
            'buy_qty' => $buy_qty,
            'price' => $price,
            'date' => $date
        );
        array_push($or_arr['order'], $getOrder);
    }
    echo json_encode($or_arr['order']);
} else {
    echo json_encode('No Data Found');
}
