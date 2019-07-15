<?php
/**
 * Created by IntelliJ IDEA.
 * User: Malki
 * Date: 7/14/2019
 * Time: 12:58 PM
 */
?>

<?php
$iid = $_POST['iid'];

include "../dbConnection.php";

if (!$connection){
    echo mysqli_connect_error();
}else{
    $SQL = "DELETE FROM Item WHERE iid='$iid'";
}
$result = mysqli_query($connection,$SQL);
if($result){
    echo "Item Deleted From System";
}else{
    echo "Item Can not Be Deleted";
   mysqli_error($connection);
}