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
    $cus_arr['customer'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $getCus = array(
            'CusID' => $CusID,
            'Name' => $Name,
            'Address' => $Address,
            'Salary' => $Salary
        );
        array_push($cus_arr['customer'], $getCus);
    }
    echo json_encode($cus_arr['customer']);
} else {
    echo json_encode('No Data Found');
}
