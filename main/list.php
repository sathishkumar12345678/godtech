


<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
<body>

<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <button type="button" class="btn btn-warning"><a style="text-decoration:none;color:black" href="add.php" >ADD</a></button>

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







  <div>
<table class="table table-striped-columns table table-hover">
<thead class="table table-info ">
    <tr>
        <th>Sno</th>
        <th>Id</th>
        <th>Product</th>
        <th>Price</th>
        <th>Model</th>
        <th>Stock</th>
        <th>Action</th>
</tr>
</thead>
<tbody class="table-dark">
<?php

$con=mysqli_connect("localhost","root","");

$db=mysqli_select_db($con,"product");

$q="select * from purchase";

$data=mysqli_query($con,$q);

$d=1;

while($row=mysqli_fetch_array($data)){
$uid=$row['id'];
$uname=$row['product_name'];
$uprice=$row['price'];
$umodel=$row['product_model'];
$ustock=$row['stock'];



?>
    <tr>
        <td><?php echo $d ?></td>
        <td><?php echo $uid ?></td>
        <td><?php echo $uname ?></td>
        <td><?php echo $uprice ?></td>
        <td><?php echo $umodel ?></td>
        <td><?php echo $ustock ?></td>
        <td><button class="btn btn-warning"><a style="text-decoration:none;color:black" href='viewedit.php?eid=<?php echo $uid ?>'>Edit</a></button>
        &nbsp;<button class="btn btn-danger"><a style="text-decoration:none;color:black" href='del.php?delid=<?php echo $uid ?>'>Delete</a></button></td>
    </tr>
    <?php $d++; } ?>
</tbody>
</table>

</div>

</body>
</html>