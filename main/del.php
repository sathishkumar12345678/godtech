<?php
$con=mysqli_connect("localhost","root","");

$db=mysqli_select_db($con,"product");

$dele=$_GET['delid'];

    $q="delete from purchase where id='$dele'";


if(mysqli_query($con,$q)){

    echo '<script> location.replace("list.php")</script>';
}
else{
    echo "somthing error issues".$con->error;
}






?>
