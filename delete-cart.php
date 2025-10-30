<?php
	$con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");

	$pid = $_GET['pid'];
	$oid = $_GET['oid'];

	pg_query($con, "delete from cart where pid=$pid and oid=$oid");

	header("Location: cart.php");
?>