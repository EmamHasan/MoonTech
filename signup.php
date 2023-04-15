<?php

@include "config.php";
if(isset($_POST["submit"])){
    $name = mysqli_real_escape_string($connect,$_POST["name"]);
    $contact = mysqli_real_escape_string($connect,$_POST["number"]);
    $pass = md5($_POST["password"]);
    $cpass = md5($_POST["cpassword"]);
    $user_type = $_POST["user_type"];
    $ref=$_POST["reference"];
    if ($user_type=="Admin"){
        $select = 'select * from administrator where Phone_Number="$contact"';
    }
    else{
        $select = 'select * from customer where Phone_Number="$contact"';
    }
    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result)>0){
        $error[] = $user_type." Already Exist!";
    }
    elseif ($user_type=="Admin" && $ref!="55A66"){
      $error[]='Your Admin Reference is INVALID!';
    }
    else{
        if ($pass != $cpass){
            $error[]='Password did not match!';
        }
        else{
            if ($user_type=="Admin"){
                $insert="insert into administrator(Admin_Name, Phone_Number, Password) values('$name','$contact', '$pass')";}
            else{
                $insert="insert into customer(Customer_Name, Phone_Number, Password) values('$name','$contact', '$pass')";}
            mysqli_query($connect, $insert);
            header('location:login.php');
        }
    }}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->
    <title>Signup</title>

</head>
<body>

<div class="container">
    
<nav class="navbar navbar-expand-lg navbar-light justify-content-between">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><img src="images/moon.png" width="30" height="30" class="d-inline-block align-top" alt="">   MoonTech</a>

  <div class="collapse navbar-collapse" id="nav1">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
      <a class="nav-link pbuil" href="pcbuilder.php">PC Builder</a>
      </li>
      <li class="nav-item">
        <button class="btn-primary cart"><a class="nav-link" href="cart.php">Cart</a></button>
      </li>

    </ul>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo04">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav2">

      <li class="nav-item">
        <a class="nav-link" href="processor.php">Processor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="motherboard.php">Motherboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ram.php">RAM</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Storage
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">HDD</a>
          <a class="dropdown-item" href="#">SSD</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gpu.php">Graphics Card</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="monitor.php">Monitor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="powerSupply.php">Power Supply</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">CPU Cooler</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Accessories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Printer</a>
          <a class="dropdown-item" href="#">Casing</a>
          <a class="dropdown-item" href="#">Keyboard</a>
          <a class="dropdown-item" href="#">Mouse</a>
          <a class="dropdown-item" href="#">Headphone</a>
        </div>
      </li>
    </ul>
  </div>
</nav>





<div class="form-container">
        <form action="" method="post">
            <h3>
                Register Now
            </h3>
            <?php
                if (isset($error)) {
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <input type="text" class="form-control" name="name" required placeholder="Enter Your Name">
            
            <input type="tel" class="form-control" name="number" required placeholder="Enter Your Contact Number">
            <input type="email" class="form-control" name="email" required placeholder="Enter Your Email">
            <select name="user_type" >
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <input type="password" id='pass' class="form-control" name="password" required placeholder="Enter Your Password">
            <input type="password" id='pass' class="form-control" name="cpassword" required placeholder="Confirm Your Password">
            <input type="text" class="form-control" name="reference" placeholder="Reference Code (For Admin Signup)">
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </div>














<footer>
  <p>Copyright: Team Amigos<br>
  <a href="mailto:emam.hasan@g.bracu.ac.bd">Contact @ Amigos</a></p>
</footer>
</div>
<!-- <input type="hidden" id="admin" value="<?php if(!isset($_SESSION['admin_name'])){echo "true";}else{echo "null";}?>" />
<input type="hidden" id="user" value="<?php if(!isset($_SESSION['user_name'])){echo "true";}else{echo "null";}?>" />
<script>
    admin= <?php if(!isset($_SESSION['admin_name'])){echo "true";}else{echo "null";}?>;
    user=<?php if(!isset($_SESSION['user_name'])){echo "true";}else{echo "null";}?>;
    if (user!="null" or admin!="null"){
        document.getElementById(loginn).style.display="none";
        document.getElementById(logoutt).style.display="block";
    }else{
        document.getElementById(loginn).style.display="block";
        document.getElementById(logoutt).style.display="none";
    }
</script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>