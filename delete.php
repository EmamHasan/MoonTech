<?php

$con = mysqli_connect('localhost','root', '', 'moontech');

if (isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $query = "DELETE FROM customer where Customer_ID=$delete";
    $del = $con->query($query);
    if ($del){
        header('location:show.php');
    }else{
        echo "Something went wrong";
    }
}

?>