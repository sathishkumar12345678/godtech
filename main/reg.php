
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<body>
<nav class="navbar bg-body-tertiary" >
  <div class="container" style="background-color:#f64f59;color:white">
    <a class="navbar-brand" href="#">
      <img src="user.png"  width="50" height="54">
    </a>
    <h1>Registration Form</h1>
    <a class="navbar-brand" href="#">
      <img src="user.png"  width="50" height="54">
    </a>
    
  </div>
  
</nav>

<div class="container"style="position:relative;bottom:5px;background-color:#c471ed " >
<div class="row">
    <div class="col-md-3"></div>
<div class="col-md-6" style="margin-top:40px">
<form action="reg.php" method="post" style="border:0px black solid;padding:30px;border-radius:0px;background-color:white;color:black">
<p>
 <label>First Name:</label>
    <input type="text" name="fn" class="form-control" required autofocus  pattern="[A-Za-z]{3,12}" title="should be 3 to 12 chars">
</p>

<p>
    <label>Last Name:</label>
    <input type="text" name="ln"class="form-control" required  pattern="[A-Za-z]{3,12}" title="should be 3 to 12 chars">
</p>

<p>
    <label>User Name:</label>
    <input type="text" name="un" class="form-control" required pattern="[A-Za-z]{3,22}" title="should be 3 to 22 chars">
</p>

<p>
    <label>Email Id:</label>
    <input type="email" name="em" class="form-control" required>
</p>

<p>
    <label>Date Of Birth:</label>
    <input type="date" name="da" class="form-control" required>
</p>

<p>
    <label>Known Language:</label>
    <textarea rows="2" cols="3" name="kl" class="form-control" required pattern="[A-Za-z]{3,22}" title="should be 3 to 22 chars"></textarea>
</p>

<p>
    <label>Country:</label>
    <select name="cn" class="form-control" required>
        <option value="">None</option>
        <option>India</option>
        <option>Japan</option>
        <option>America</option>
        <option>China</option>
        <option>Rassia</option>
    </select>
</p>

<p>
    <label>State:</label>
    <select name="st" class="form-control" required>
    <option value="">None</option>
        <option>Tamil Nadu</option>
        <option>Andra Pradesh</option>
        <option>Assam</option>
        <option>Telungana</option>
        <option>Nagaland</option>
    </select>
</p>

<p>
    <label>City:</label>
    <select name="ct" class="form-control" required>
    <option value="">None</option>
        <option>Chennai</option>
        <option>Kolkata</option>
        <option>Bangalore</option>
        <option>Delhi</option>
        <option>Mumbai</option>
    </select>
</p><br>
<div class="text-center" >
<input type="submit" value="Login" name="sub" class="btn btn-block btn-primary form-control"  >
</div>
</form>
</div>
</div>
</div>

<?php

$con=mysqli_connect("localhost","root","");

$db=mysqli_select_db($con,"product");


if(isset($_POST['sub'])){

    $rfname=$_POST['fn'];
    $rlname=$_POST['ln'];
    $runame=$_POST['un'];
    $remail=$_POST['em'];
    $rdate=$_POST['da'];
    $rkl=$_POST['kl'];
    $rcoun=$_POST['cn'];
    $rstate=$_POST['st'];
    $rcity=$_POST['ct'];

    $q="insert into data(first_name,last_name,user_name,email,dob,known_lang,country,state,city) values
    ('$rfname','$rlname','$runame','$remail','$rdate','$rkl','$rcoun','$rstate','$rcity')";

        
    if(mysqli_query($con,$q)){

        $con=mysqli_connect("localhost","root","");

        $db=mysqli_select_db($con,"product");

        $q="select email from data";

        $data=mysqli_query($con,$q);

        $remail=$_POST['em'];

        $d=0;

        while($row=mysqli_fetch_array($data)){
        $gg=$row['email'];

        if($gg == $remail){
        $d=$d+1;
        }
    }
    if($d>1){
    echo '<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      This Account Already Exist.........
    </div>';
    }
    else{
    echo '<script>location.replace("login.php")</script>';
    }
      }
else{
        echo "somthing error issues".$con->error;
    }
    
    

}

?>
</body>
</html>