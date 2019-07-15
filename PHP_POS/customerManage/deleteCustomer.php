<?php
/**
 * Created by IntelliJ IDEA.
 * User: Malki
 * Date: 7/14/2019
 * Time: 12:55 PM
 */
?>

<?php
$cid = $_POST['cid'];

include '../dbConnection.php';

if(!$connection){
    echo mysqli_connect_error();
}else{
    $SQL = "DELETE FROM customer WHERE cid='$cid'";
}
$result = mysqli_connect($connection,$SQL);
if($result){
    echo "Customer has been Deleted";
}else{
    echo "Customer not Deleted";
    mysqli_error($connection);
}
