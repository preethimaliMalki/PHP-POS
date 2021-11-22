<?php

include_once '../../config/DBConnection.php';
include_once '../../models/Customer.php';

$database = new DBConnection();
$db = $database->dbConnections();

$cus = new Customer($db);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cus->Name = $_POST['Name'];
    $cus->Address = $_POST['Address'];
    $cus->Salary = $_POST['Salary'];
    $cus->CusID = $_POST['CusID'];
    if ($cus->update()) {
        echo json_encode("Customer Updated");
    } else {
        echo json_encode("Customer Could not be updated");
    }
}
