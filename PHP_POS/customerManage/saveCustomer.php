<?php
/**
 * Created by IntelliJ IDEA.
 * User: Malki
 * Date: 7/14/2019
 * Time: 12:52 PM
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
    $SQL = "Insert into customer values ('$cid','$name','$address','$email','$credit')";
    $result = mysqli_query($connection,$SQL);
    if($result){
        echo "Customer Added Successfully";
    }else{
        echo "Customer not Added";
        mysqli_query($connection);
    }
}
