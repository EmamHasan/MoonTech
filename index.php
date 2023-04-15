<?php
@include "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">    
    <title>MoonTech</title>
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
      <?php if (isset($_SESSION['admin_name']) && !empty($_SESSION['admin_name'])){?>
		<li class="nav-item">
        <button class="btn-primary cart"><a class="nav-link" href="cus_cart.php">Top Customers</a></button>
      </li>
		<li class="nav-item">
        <button class="btn-primary cart"><a class="nav-link" href="toprods.php">Top Sellings</a></button>
      </li>
        <li class="nav-item">
        <button class="btn-primary cart"><a class="nav-link" href="show.php">Customer's Info</a></button>
      </li>
        <li class="nav-item"> 
        <button class="btn-primary cc"><a class="nav-link" href="#"> <span><?php echo $_SESSION['admin_name'] ?></span></a></button>
      </li>
      <li class="nav-item" id="logoutt">
        <button class="btn-primary cc"><a class="nav-link" href="logout.php">Logout</a></button>
      </li>
      <?php } elseif (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){?>
        <li class="nav-item">
        <button class="btn-primary cart"><a class="nav-link" href="cart.php">Cart</a></button>
      </li>
        <li class="nav-item"> 
        <button class="btn-primary cc"><a class="nav-link" href="#"> <span><?php echo $_SESSION['user_name'] ?></span></a></button>
      </li>
        <li class="nav-item" id="logoutt">
        <button class="btn-primary cc"><a class="nav-link" href="logout.php">Logout</a></button>
      </li> <?php } else{ ?>
      <li class="nav-item" id="loginn">
        <button class="btn-primary cc"><a class="nav-link" href="login.php">Login | Signup</a></button>
      </li>
      <?php } ?>
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

















<section>
    <div class="container text-center" style="padding-top: 100px;">
        <button style="border-style: solid; border-color: coral; background: rgba(0,0,0,0); height: 90px;">
            <h1 class='text-center' style="color: white; padding: 20px">Welcome to Moon Tech</h1>
        </button>
        <h2 style="padding-top: 50px; color:white;">Browse:</h2>
        <hr>
    </div>
    <div class="container text-center" style="padding-top: 20px; padding-bottom: 70px; margin:auto;" id="c1">
        <div class="row gx-0 text-center" >
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="processor.php" class="nav-link3">
                    <h1 style="padding: 20px;">Processor</h1>
                    
                </a>
            </div>
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="motherboard.php" class="nav-link2">
                    <h1 style="padding: 20px;">Motherboard</h1>
                  
                </a>
            </div>
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="ram.php" class="nav-link3">
                    <h1 style="padding: 20px;">RAM</h1>
                   
                </a>
            </div>
            
        </div>
        <div class="row gx-0 text-center">
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="/signup" class="nav-link2">
                    <h1 style="padding: 20px;">HDD</h1>
                 
                </a>
            </div>
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="/login" class="nav-link3">
                    <h1 style="padding: 20px;">SSD</h1>
                   
                </a>
            </div>
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="gpu.php" class="nav-link2">
                    <h1 style="padding: 20px;">GPU</h1>
                  
                </a>
            </div>
            
        </div>
        <div class="row gx-0 text-center" >
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="monitor.php" class="nav-link3">
                    <h1 style="padding: 20px;">Monitor</h1>
                    
                </a>
            </div>
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="/signup" class="nav-link2">
                    <h1 style="padding: 20px;">Printer</h1>
                  
                </a>
            </div>
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="/login" class="nav-link3">
                    <h1 style="padding: 20px;">Keyboard</h1>
                   
                </a>
            </div>
            
        </div>
        <div class="row gx-0 text-center">
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="powerSupply.php" class="nav-link2">
                    <h1 style="padding: 20px;">Power Supply</h1>
                 
                </a>
            </div>
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="/login" class="nav-link3">
                    <h1 style="padding: 20px;">Mouse</h1>
                   
                </a>
            </div>
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="/signup" class="nav-link2">
                    <h1 style="padding: 20px;">Casing</h1>
                  
                </a>
            </div>
            
        </div>
<!--Delete if necessary-->
        <div class="row gx-0 text-center">
            <div class="col-lg text-center m-4 p-5" style="background: black; color: white; border-radius: 30px;">
                <a href="/signup" class="nav-link2">
                    <h1 style="padding: 20px;">CPU Cooler</h1>
                 
                </a>
            </div> 
        </div>
<!--Delete if necessary-->
    </div>
    

</section>






<footer>
  <p>Copyright: Team Amigos<br>
  <a href="mailto:emam.hasan@g.bracu.ac.bd">Contact @ Amigos</a></p>
</footer>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>