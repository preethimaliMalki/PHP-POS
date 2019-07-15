<?php
/**
 * Created by IntelliJ IDEA.
 * User: Malki
 * Date: 7/14/2019
 * Time: 12:57 PM
 */
?>

<?php
$iid = $_POST['iid'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];

include "../dbConnection.php";

if (!$connection){
    mysqli_connect_error();
}else{
    $SQL = "INSERT INTO Customer VALUES ('$iid','$name','$qy','$price')";
    $result = mysqli_query($connection,$SQL);
    if ($result){
        echo "Item Added Successfully";
    }else{
        echo "Item Not Added";
       mysqli_error($connection);
    }
}