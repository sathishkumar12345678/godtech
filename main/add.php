
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
<body style="background-color:#C9D6FF">

<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <img src="lion.png" style="height: 80px;width: 100px;">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>
       

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2"><a style="text-decoration:none;color:white" href="login.php" >Login</a></button>
          <button type="button" class="btn btn-warning"><a style="text-decoration:none;color:black" href="reg.php" >Register</a></button>
        </div>
      </div>
    </div>
  </header>
  <div class="container"style="padding:10px">
<div class="row">
    <div class="col-md-4"></div>
<div class="col-md-4">
<h4 align="center">ADD PRODUCT</h4>
<form method="post" action="add.php" style="border:6px blue solid;padding:30px;border-radius:75px;background-color:black;color:white">
<p>
    <label>Product Name:</label>
    <input type="text" name="pn" class="form-control" required autofocus>
</p>
<p>
    <label>Price:</label>
    <input type="number" name="pp"class="form-control" required>
</p>

<p>
    <label>Model:</label>
    <input type="text" name="pm" class="form-control" required>
</p>
<p>
    <label>Stock:</label>
    <input type="number" name="ps" class="form-control" required>
</p>

<input type="submit" value="Add" class="btn btn-primary" name="ss">&nbsp;&nbsp;&nbsp;<button class="btn btn-success">
    <a style="color:white;text-decoration:none" href="list.php">List</a></button>
</form>
</div>
</div>
</div>

<?php
$con=mysqli_connect("localhost","root","");

$db=mysqli_select_db($con,"product");

if(isset($_POST['ss'])){

    $proname=$_POST['pn'];
    $proprice=$_POST['pp'];
    $promodel=$_POST['pm'];
    $prostock=$_POST['ps'];

    $q="insert into purchase(product_name,price,product_model,stock)values('$proname','$proprice','$promodel','$prostock')";


if(mysqli_query($con,$q)){

    echo '<script> location.replace("list.php")</script>';
}
else{
    echo "somthing error issues".$con->error;
}


}



?>
</body>
</html>
























