<?php
/**
 * Created by IntelliJ IDEA.
 * User: malki
 * Date: 7/14/2019
 * Time: 12:58 PM
 */
?>

<?php
$iid = $_POST['iid'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['price'];

include "../dbConnection.php";

if(!$connection){
    echo mysqli_connect_error();
}else{
    $SQL = "UPDATE Item SET name='$name',qty='$qty',price='$price'WHERE iid='$iid'";
}
$result = mysqli_query($connection,$SQL);
if ($result){
    echo "Item Updated Successfully";
}else{
    echo "Item Failed to Update";
    mysqli_error($connection);
}