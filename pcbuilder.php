<?php
@include "config.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/stylep.css">
  <link rel="stylesheet" href="css/f-bootstrap.css">
  <title>PC Builder</title>
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
<form method="post" class="search_select_box">
        <h3>
                Build Your PC
        </h3>
        <label for="processor" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">Processor:</label>
        <select id="processor" name="processor" >
        	<option value="">Select Processor</option>
        </select>
        <label for="motherboard" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">Motherboard:</label>
        <select id="motherboard" name="motherboard" >
        	<option value="">Select Motherboard</option>
        </select>
        <label for="ram" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">RAM:</label>
        <?php 
        $s='select * from (products natural join ram)';
        $resultt=mysqli_query($connect, $s);
        ?>
        <select id="ram" name="ram" data-live-search="true" class="w-100">
        	<option value="">Select RAM</option>
          <?php while($row=mysqli_fetch_array($resultt)){?>
  	 	        <option value="{$row['Product_ID']}"><?php echo $row['Model'],$row["Capacity"]." | Price".$row["Selling_Price"]; ?></option>
  	            <?php }?>
        </select>
        <?php 
        $s='select * from (products natural join ssd)';
        $resultt=mysqli_query($connect, $s);
        ?>
        <label for="ssd" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">SSD:</label>
        <select id="ram" name="ssd" data-live-search="true" class="w-100">
        	<option value="">Select SSD</option>
          <?php while($row=mysqli_fetch_array($resultt)){?>
  	 	        <option value="{$row['Product_ID']}"><?php echo $row['Model']." | Price".$row["Selling_Price"]; ?></option>
  	            <?php }?>
        </select>
        <?php 
        $s='select * from (products natural join hdd)';
        $resultt=mysqli_query($connect, $s);
        ?>
        <label for="hdd" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">Hard disk:</label>
        <select id="ram" name="hdd" data-live-search="true" class="w-100">
        	<option value="">Select Hard Disk</option>
          <?php while($row=mysqli_fetch_array($resultt)){?>
  	 	        <option value="{$row['Product_ID']}"><?php echo $row['Model']." | Price".$row["Selling_Price"]; ?></option>
  	            <?php }?>
        </select>
        <?php 
        $s='select * from (products natural join cooler)';
        $resultt=mysqli_query($connect, $s);
        ?>
        <label for="cooler" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">CPU Cooler:</label>
        <select id="ram" name="cooler" data-live-search="true" class="w-100">
        	<option value="">Select CPU Cooler</option>
          <?php while($row=mysqli_fetch_array($resultt)){?>
  	 	        <option value="{$row['Product_ID']}"><?php echo $row['Model']." | Price".$row["Selling_Price"]; ?></option>
  	            <?php }?>
        </select>
        <?php 
        $s='select * from (products natural join gpu)';
        $resultt=mysqli_query($connect, $s);
        ?>
        <label for="gpu" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">Graphics Card:</label>
        <select id="ram" name="gpu" data-live-search="true" class="w-100">
        	<option value="">Select Graphics Card</option>
          <?php while($row=mysqli_fetch_array($resultt)){?>
  	 	        <option value="{$row['Product_ID']}"><?php echo $row['Model']." | Price".$row["Selling_Price"]; ?></option>
  	            <?php }?>
        </select>
        <?php 
        $s='select * from (products natural join power_supply)';
        $resultt=mysqli_query($connect, $s);
        ?>
        <label for="psupply" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">Power Supply:</label>
        <select id="ram" name="psupply" data-live-search="true" class="w-100">
        	<option value="">Select Power Supply</option>
          <?php while($row=mysqli_fetch_array($resultt)){?>
  	 	        <option value="{$row['Product_ID']}"><?php echo $row['Model']." | Price".$row["Selling_Price"]; ?></option>
  	            <?php }?>
        </select>
        <?php 
        $s='select * from (products natural join casing)';
        $resultt=mysqli_query($connect, $s);
        ?>
        <label for="casing" class="w-100" style="text-align:left; margin-bottom: 0px; margin-top: 8px">Casing:</label>
        <select id="ram" name="casing" data-live-search="true" class="w-100">
        	<option value="">Select Casing</option>
          <?php while($row=mysqli_fetch_array($resultt)){?>
  	 	        <option value="{$row['Product_ID']}"><?php echo $row['Model']." | Price".$row["Selling_Price"]; ?></option>
  	            <?php }?>
        </select>
        <input type="submit" name="submit" value="print" onclick="window.print();" class="form-btn">
      </form>
</div>
</div>




<footer>
<p>Copyright: Team Amigos<br>
<a href="mailto:emam.hasan@g.bracu.ac.bd">Contact @ Amigos</a></p>
</footer>


<script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "load-cs.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "motherboardData"){
  					$("#motherboard").html(data);
  				}else{
  					$("#processor").append(data);
  				}
  				
  			}
  		});
  	}

  	loadData();

  	$("#processor").on("change",function(){
  		var processor = $("#processor").val();

  		if(processor != ""){
  			loadData("motherboardData", processor);
  		}else{
  			$("#processor").html("");
  		}

  		
  	})
  });
</script>

<script>
  $(document).ready(function(){
    $('.search_select_box #ram').selectpicker();
  })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</body>
</html>
