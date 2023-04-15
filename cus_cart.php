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

</head>
<body class='container'>
    <h1>Top Customers of this Month</h1>
    <br>
    <table class="table table-bordered">
        <thead>
			<tr>
				<th>Customer ID</th>
				<th>Full Name</th>
				<th>Spent</th>
			</tr>
		</thead>

        <tbody>
            <?php
            
            $con = mysqli_connect('localhost','root', '', 'moontech');
            $sel = "select Customer_ID,Customer_Name, sum(price) as total from (cart inner join customer on cart.Buyer_Customer=customer.Customer_ID) WHERE order_date >='2022-08-01' and order_date <='2022-08-31' and cart.status = 'complete' group by Buyer_Customer order by total desc";
            $query = $con->query($sel);
            while($row = $query->fetch_assoc()) {
            ?>


                <tr>
                    <td><?php echo $row["Customer_ID"]; ?></td>
                    <td><?php echo $row["Customer_Name"]; ?></td>
                    <td><?php echo $row["total"]; ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>
</html>