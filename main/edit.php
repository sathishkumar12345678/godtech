<?php
$con=mysqli_connect("localhost","root","");

$db=mysqli_select_db($con,"product");

if(isset($_POST['ss'])){
    $editid=$_POST['op'];
    $proname=$_POST['pn'];
    $proprice=$_POST['pp'];
    $promodel=$_POST['pm'];
    $prostock=$_POST['ps'];
    $q="update purchase set product_name='$proname',price='$proprice',product_model='$promodel',stock='$prostock' where id='$editid'";


if(mysqli_query($con,$q)){

    echo '<script> location.replace("list.php")</script>';
}
else{
    echo "somthing error issues".$con->error;
}




}

?>