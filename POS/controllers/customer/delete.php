<?php
include_once '../../config/DBConnection.php';
include_once '../../models/Customer.php';

$database = new DBConnection();
$db = $database->dbConnections();

$cus = new Customer($db);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cus->CusID = $_POST['CusID'];
    $result = $cus->delete();
    if ($result) {
        echo json_encode("Customer Deleted");
    } else {
        echo json_encode("Customer could not be deleted");
    }
}
