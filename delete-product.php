<?php
	$con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");

	$id = $_GET['id'];

	pg_query($con, "delete from product where id=$id");

    unlink("products/$id.jpg");

	header("Location: products.php");
?>
