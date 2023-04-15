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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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


<div class="form-container">
        <form action="" method="post">

            <input type="text" class="form-control" name="model" required placeholder="Model">
            <input type="text" class="form-control" name="brand" required placeholder="Brand">
            <input type="tel" class="form-control" name="pprice" required placeholder="Purchase Price">
            <input type="tel" class="form-control" name="sprice" required placeholder="Selling Price">

            <select onchange="JavaScript: showAppropriateForm( this.value );">
            <option disabled selected> -- Select a Product Category -- </option>
            <option value="processor">Processor</option>
            <option value="mboard">Motherboard</option>
            <option value="ram">RAM</option>
            <option value="hdd">HDD</option>
            <option value="ssd">SSD</option>
            <option value="gpu">GPU</option>
            <option value="monitor">Monitor</option>
            <option value="printer">Printer</option>
            <option value="psupply">Power Supply</option>
            <option value="cpucooler">CPU Cooler</option>
            <option value="casing">Casing</option>
            <option value="mouse">Mouse</option>
            <option value="keyboard">Keyboard</option>
            </select>

            <div class="p" id="processor" style="display:none;">
            <input type="text" class="form-control" name="socket" placeholder="Socket">
            <input type="number" class="form-control" name="cores" placeholder="Cores">
            <input type="number" class="form-control" name="threads" placeholder="Threads">
            </div>
            <div class="m" id="mboard" style="display:none;">
            <input type="text" class="form-control" name="ptype" placeholder="Processor Type">
            <input type="text" class="form-control" name="msize" placeholder="Motherboard Size">
            <input type="text" class="form-control" name="sram" placeholder="Supported Rams">
            </div>
            <div class="r" id="ram" style="display:none;">
            <input type="text" class="form-control" name="memtype" placeholder="Memory Type">
            <input type="number" class="form-control" name="rcapacity" placeholder="Capacity">
            <input type="number" class="form-control" name="busspeed" placeholder="Bus Speed">
            <input type="text" class="form-control" name="rfeatures" placeholder="Features">
            </div>
            <div class="r" id="hdd" style="display:none;">
            <input type="text" class="form-control" name="hcapacity" placeholder="Capacity">
            <input type="number" class="form-control" name="rpm" placeholder="RPM">
            <input type="number" class="form-control" name="hinterface" placeholder="Interface">
            <input type="text" class="form-control" name="hformfactor" placeholder="Form Factor">
            </div>
            <div class="r" id="ssd" style="display:none;">
            <input type="text" class="form-control" name="sinterface" placeholder="Interface">
            <input type="number" class="form-control" name="sformfactor" placeholder="Form Factor">
            <input type="number" class="form-control" name="reads" placeholder="Read Speed">
            <input type="text" class="form-control" name="writes" placeholder="Write Speed">
            <input type="text" class="form-control" name="scapacity" placeholder="Capacity">
            <input type="text" class="form-control" name="technology" placeholder="Technology">
            </div>


            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </div>










<footer>
  <p>Copyright: Team Amigos<br>
  <a href="mailto:emam.hasan@g.bracu.ac.bd">Contact @ Amigos</a></p>
</footer>
</div>
<script src="js/adddrop.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>