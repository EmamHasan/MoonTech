<?php
@include "config.php";
session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login.php');
 }
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <link rel="stylesheet" href="css/admin-view.css">
</head>
<body>
    <div class="cont">
    <div class="content">
        <h3>Hi, <span><?php echo $_SESSION['user_name'] ?></span></h3>
        <h1>Welcome</h1>
        <p>This is a user Page</p>
        <h1><a href="order_history.php">Order History</a></h1>


        <a href="login.php" class="btn">Login</a>
        <a href="signup.php" class="btn">Register</a>
        <a href="logout.php" class="btn">Logout</a>
        <a href="storedb.php" class="btn">Visit Store</a>

    </div>
    </div>

</body>
</html>