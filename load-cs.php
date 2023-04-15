<?php

	$conn = mysqli_connect("localhost","root","","moontech") or die("Connection failed");

	if(!isset($_POST['type'])){
		$sql = "SELECT * FROM products natural join processor";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['Product_ID']}'>{$row['Model']} | Price: {$row['Selling_Price']}</option>";
		}
	}else if($_POST['type'] == "motherboardData"){

		// $sql = "select * from (products natural join motherboard)";
		$sql = "select * from (products natural join motherboard) where Product_ID in (select New_Product from compatibility where Previous_Product={$_POST['id']})";
		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['Product_ID']}'>{$row['Model']} | Price: {$row['Selling_Price']}</option>";
		}
	}

	echo $str;
 ?>
