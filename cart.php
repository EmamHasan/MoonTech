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
        <button class="btn-primary cart"><a class="nav-link" href="#">Cart</a></button>
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



<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "moontech";


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "";
    
}

?>

<br><br><br>
<h3 class="text-center"><b><i>Your Cart</i></b></h3>



<div class="container" style="border-radius: 30px; padding: 30px;">
  <table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Purchase ID</th>
            <th>Order Date</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Discount</th>
            <th>Total Price</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
            <?php
            $sql = "SELECT * FROM `pending_cart` WHERE statusf='pending'";
            $result = mysqli_query($conn, $sql);
            $tp = 0;
            if ($result->num_rows > 0) {
              while ($row = $result-> fetch_assoc()){
                $tp = intval($tp) + intval($row["total"]);
                $qq="DELETE FROM pending_cart WHERE purchaseid={$row['purchaseid']}";?>
                <tr>
                    <td><?php echo $row["prod_name"]; ?></td>
                    <td><?php echo $row["purchaseid"]; ?></td>
                    <td><?php echo $row["o_date"]; ?></td>
                    <td><?php echo $row["quant"]; ?></td>
                    <td><?php echo  $row["price"]; ?></td>
                    <td><?php echo  $row["statusf"]; ?></td>
                    <td><?php echo  $row["discount"]; ?></td>
                    <td><?php echo  $row["total"]; ?></td>
                    <td>
                        
                        <a href="oncl.php?delete=<?php echo $row['purchaseid'];?>" class="btn btn-primary btn-danger">Delete</a>
                    </td>
                </tr><?php }} ?>

         
            ?>
    </tbody>
    
</table>
</div>


<h3 class="text-center"><b><i>To be Paid: <?php echo $tp ?></i></b></h3>
<br><br><br>
<form method="post">
<h5 style="text-align:right;"><button type="submit" class="btn btn-warning my-3">Confirm Order </button>
        </form>
        
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $sql = "SELECT * FROM `pending_cart`";
    $result = mysqli_query($conn, $sql);
    while ($row = $result-> fetch_assoc()){
        $p_id = $row["purchaseid"];
        $sql2 = "update pending_cart set statusf='Complete' where purchaseid='$p_id'";
        $result2 = mysqli_query($conn, $sql2);
        }

    }
    $conn->close();
    
    
  
  
  
  

?>
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