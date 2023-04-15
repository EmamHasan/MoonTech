<?php

@include "config.php";

if (isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $qq="DELETE FROM pending_cart WHERE purchaseid=$delete";
    $del = $connect->query($qq);
    if ($del){
        header('location:cart.php');
    }else{
        echo "Something went wrong";
    }
}

?>