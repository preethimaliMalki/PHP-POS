<?php
include_once '../../config/DBConnection.php';
include_once '../../models/Customer.php';

$database = new DBConnection();
$db = $database->dbConnections();

$cus = new Customer($db);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cus->CusID = $_POST['CusID'];
    $result = $cus->search();
    //$num = $result->rowCount();

    if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $getCus = array(
            'CusID' => $CusID,
            'Name' => $Name,
            'Address' => $Address,
            'Salary' => $Salary
        );

        echo json_encode($getCus);
    } else {
        echo json_encode('Data Not Found');
    }
}
