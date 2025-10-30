<?php
	$con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");

	$oid = $_GET["oid"];

	pg_query($con, "update orders set status='Dispatched' where order_id=$oid");

	header("Location: orders.php");
?>