<?php
/**
 * Created by IntelliJ IDEA.
 * User: Malki
 * Date: 7/14/2019
 * Time: 12:54 PM
 */
?>

<?php
$cid = $_POST['cid'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$credit = $_POST['credit'];

include '../dbConnection.php';

if (!$connection){
   echo mysqli_connect_error();
}else{
    $SQL = "UPDATE Customer SET name='$name',address='$address',email='$email',credit='$credit'WHERE cid = '$cid'";
}
$result = mysqli_connect($connection,$SQL);

if ($result){
    echo "Successfully Updated";
}else{
    echo "Failed To Update";
    mysqli_error($connection);
}
