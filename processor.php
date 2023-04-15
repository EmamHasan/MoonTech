<?php
@include 'config.php';
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "moontech";


$conn = mysqli_connect($servername, $username, $password, $database);
   
$sql = "select products.Product_ID, Selling_Price, Purchased_Price, product_image, Model, Socket, Cores, Threads from products, processor where processor.Product_ID=products.Product_ID";


$result = mysqli_query($conn, $sql);     

function component($Model, $Purchased_Price, $productimg, $Memory_Type, $Capacity, $Bus_Speed){
  $element = "
 
  <div class=\"col-md-3 col-sm-6 my-3 my-md-0 pboxx\">
              <form  method=\"post\">
                  <div class=\"card shadow\" style=\"background-color: black;\">
                      <div>
                          <img src=$productimg alt=\"Image1\" class=\"img-fluid card-img-top\">
                      </div>
                      <div class=\$productimg\"card-body\">
                          <h5 class=\"card-title\">$Model</h5>
                          
                          <p class=\"card-text\">
                          <h6>Memory Type: $Memory_Type</h6>
                          <h6>Cores: $Capacity</h6>
                          <h6>Bus Speed: $Bus_Speed<h6>

                          <h5>
                              <span class=\"price\">$Purchased_Price ৳</span>
                          </h5>

                          <h6>
                            <div class=\"row\">
                              <div class=\"col\" style=\"padding-top:5px\"> Quantity: </div>
                              <div class=\"col\"> <input type=\"text\" name=\"quant\" class=\"form-control\" value=\"1\" style=\"background:black; width:80%\"></div>
                            </div>
                          </h6>
                          <input type=\"hidden\" name=\"hidden_name\" value=\" $Model \">
                          
                          <input type=\"hidden\" name=\"hidden_price\" value=\" $Purchased_Price \">

                          <button type=\"submit\" class=\"btn btn-warning my-3\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                      </div>
                  </div>
              </form>
          </div>
  ";
  echo $element;
}




if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $quant = (int) $_POST['quant']; 
  $Model1 = $_POST['hidden_name'];
  $Price1 = (int) $_POST['hidden_price'];
  $dis = 10;
  $myDate = date('m/d/Y');
  $tot1 =  bcmul($quant, $Price1);
  $tot = $tot1 - (($dis/100) * $tot1);
  $conn = mysqli_connect($servername, $username, $password, $database);
  $sql2 = "INSERT INTO `pending_cart` (`prod_name`,`o_date`,`quant`,`price`,`statusf`, `discount`, `total`) VALUES('$Model1',current_timestamp(),'$quant','$Price1','pending','$dis','$tot')";
  $result2 = mysqli_query($conn, $sql2);



}











?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">    
    <title>Processor</title>
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



<div class="pbox">
  <div class="row text-center py-5">
    <?php
  
  while ($row = $result-> fetch_assoc()){
      component($row['Model'], $row['Purchased_Price'], $row['product_image'], $row['Socket'], $row['Cores'], $row['Threads']);
  }
    ?>

  </div>
</div> 
















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