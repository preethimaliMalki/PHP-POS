<?php

include_once '../../config/DBConnection.php';
include_once '../../models/Customer.php';

$database = new DBConnection();
$db = $database->dbConnections();

$cus = new Customer($db);

$result = $cus->read();
$num = $result->rowCount();

if ($num > 0) {
    $cus_arr = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $getCus = array(
            'CusID' => $CusID,
        );
        array_push($cus_arr, $getCus);
    }
    echo json_encode($cus_arr);
} else {
    echo json_encode('No Data Found');
}
