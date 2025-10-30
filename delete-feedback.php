<?php
$con = pg_connect(
    'host=localhost port=5432 dbname=ikart user=postgres password=postgres'
);
pg_query($con, 'delete from contact where id=' . $_GET['id']);
header('Location: feedbacks.php');
?>
