<?php session_start()?>
<title>Manage Orders</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
<body>
<?php
	$con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");

	$oid = $_GET["oid"];

	$rs = pg_query($con, "select order_id, order_date, first_name, last_name, delivery_address, phone, email, order_amount, status from orders, users where orders.uid = users.id and order_id=$oid");
	
	$row = pg_fetch_row($rs);

	$rs1 = pg_query($con, "select model_no, description, price, cart.quan, price*cart.quan,  r_sph, l_sph, r_cyc, l_cyc, r_axi, l_axi from product,cart where product.id = cart.pid and oid=$oid");
?>
<div style="padding:100px;">
<center><a href="admin-dashboard.php" class="btn btn-warning">Home</a></center>
<table class="table table-bordered">
<tr>
	<td><b>Order ID:</b></td>
	<td><?=$row[0]?></td>
</tr>
<tr>
	<td><b>Order Date:</b></td>
	<td><?=$row[1]?></td>
</tr>
<tr>
	<td><b>Name:</b></td>
	<td><?=$row[2].' '.$row[3]?></td>
</tr>
<tr>
	<td><b>Address:</b></td>
	<td><?=$row[4]?></td>
</tr>
<tr>
	<td><b>Phone:</b></td>
	<td><?=$row[5]?></td>
</tr>
<tr>
	<td><b>Email:</b></td>
	<td><?=$row[6]?></td>
</tr>
<tr>
	<td><b>Total Amount:</b></td>
	<td>Rs.<?=$row[7]?>/-</td>
</tr>
<tr>
	<td><b>Status:</b></td>
	<td><?=$row[8]?> <a href="dispatch.php?oid=<?=$row[0]?>" class="btn btn-danger">Dispatch</a></td>
</tr>
</table>
<table class="table table-bordered">
<tr class="danger">
	<th>Sr.No.</th>
	<th>Model#</th>
	<th>Product Name:</th>
	<th>Rate</th>
	<th>Qty</th>
	<th>Amount</th>
	<th>Specifications</th>
</tr>
<?php  
	$i=1;
	while($row1 = pg_fetch_row($rs1)){
?>
<tr>
	<td><?=$i++?></td>
	<td><?=$row1[0]?></td>
	<td><?=$row1[1]?></td>
	<td><?=$row1[2]?></td>
	<td><?=$row1[3]?></td>
	<td><?=$row1[4]?></td>
	<td>

            <table class="table">
                <tr>
                	<th></th>
                    <th>OD(Right EYE)</th>
                    <th>OS(Left EYE)</th>
                </tr>
                <tr>
                    <th>SPHERE(SPH)</th>
                    <td><?=$row1[4]?></td>
                    <td><?=$row1[5]?></td>
                </tr>
                <tr>
                    <th>CYLINDER(CYC)</th>
                    <td><?=$row1[6]?></td>
                    <td><?=$row1[7]?></td>
                </tr>
                <tr>
                    <th>AXIS(AXI)</th>
                    <td><?=$row1[8]?></td>
                    <td><?=$row1[9]?></td>
                </tr>
           	</table>
	</td>
</tr>
<?php  
	}
	$tot = $row[7];
	$gst = $tot * 0.018;
	$cst = $tot * 0.018;
	$final_tot = $tot + $gst + $cst;
?>
<tr>
<td colspan=5 align='right'><b>Total:</b></td>
<td>Rs. <?php printf("%.0f",$tot)?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>GST@1.8%:</b></td>
<td>Rs. <?php printf("%.0f",$gst)?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>CST@1.8%:</b></td>
<td>Rs. <?php printf("%.0f",$cst)?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>Final Total:</b></td>
<td>Rs. <?php printf("%.0f",$final_tot)?>/-</td>
</tr>

</table>
<center><button class="btn btn-warning" onclick='window.print()'>Print</button></a></center>

</div>
