<?php
@include "config.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body class='container'>
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



<h1>Top selling products of this month</h1>
    <br>
    <table class="table table-bordered">
        <thead>
			<tr>
				<th>Model</th>
                <th>Total Sell</th>
			</tr>
		</thead>
        <tbody>

                    <?php
            
            $con = mysqli_connect('localhost','root', '', 'moontech');

            

            $sel = "select prod_name, count(*) as total_sell from pending_cart where statusf='complete' group by prod_name";
            $query = $con->query($sel);
            while($row = $query->fetch_assoc()) {
            ?>


                <tr>
                    <td><?php echo $row["prod_name"]; ?></td>
                    <td><?php echo $row["total_sell"]; ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>



<footer>
  <p>Copyright: Team Amigos<br>
  <a href="mailto:emam.hasan@g.bracu.ac.bd">Contact @ Amigos</a></p>
</footer>
</div>

</body>
</html>