<?php
$con = pg_connect(
    'host=localhost port=5432 dbname=ikart user=postgres password=postgres'
);
pg_query($con, 'delete from users where id=' . $_GET['id']);
header('Location: customers.php');
?>
