<?php

include_once '../../config/DBConnection.php';
include_once '../../models/Customer.php';

$database = new DBConnection();
$db = $database->dbConnections();
$cus = new Customer($db);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cus->CusID = $_POST['CusID'];
    $cus->Name = $_POST['Name'];
    $cus->Address = $_POST['Address'];
    $cus->Salary = $_POST['Salary'];
    if ($cus->create()) {
        echo json_encode("Customer Added Successfully");
    } else {
        echo json_encode("Customer Could not be added");
    }
}
