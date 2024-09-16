<?php


?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:black;">

<section class="vh-100 gradient-custom" >
  <div class="container py-5 h-100 " >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card  text-black" style="border-radius: 1rem; background-color:#FC5C7D">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
<form action="login.php" method="post">
              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" name="tx" class="form-control form-control-lg" required autofocus/>
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="password" name="pass" id="typePasswordX" class="form-control form-control-lg" pattern="[A-Za-z0-9@$#]{12}" title="should be 12 chars" required/>
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg px-5" type="submit" name="su">Login</button>
</form>     
            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="reg.php" class="text-primary-50 fw-bold">Register</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
















<br><br><br>








<?php

$con=mysqli_connect("localhost","root","");

$db=mysqli_select_db($con,"product");

$q="select email from data";

$data=mysqli_query($con,$q);
$d=0;
while($row=mysqli_fetch_array($data)){

$d=$d+1;
$tt=$row['email'];
}
if(isset($_POST['su'])){
    $yy=$_POST['tx'];
    if($yy == $tt){
        echo  '<script>location.replace("add.php")</script>';
    }
    else{
       echo '<script>alert("Invalid Email......")</script>';
    }
}

?>
</body>
</html>















