<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<style>
   
    .profilebox{
        width: 400px;
            position: absolute;
            background: #b6e7f7;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border: .5px solid black;
            border-radius: 10px;
        text-align: center;
        color: #424242;

    }
    .available-amount{
        background: white;
        width: auto;
        height: 100px;
        border-radius: 10px;
    }
    .user-name{
        margin-top: 20px;
    }
    .user-gmail{
        margin-top: 10px;
    }
    .available-amount{
        margin-top: 40px;
    }
    .available-amount p{
        padding:15px 0px;
    }
   
</style>
<body>
        <?php
        include_once "header.php";

    $con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");

    $rs = pg_query($con, "select * from users where id=".$_SESSION['uid']);
    $row = pg_fetch_assoc($rs);
?>
    <div class="profilebox">
    
        <div class="user-name">
            <h4>Full Name: <?=$row['first_name'].' '.$row['last_name']?></h4>
        </div>
        <div class="user-gmail">
            <h4>Email: <?=$row['email']?></h4>
        </div>
        <div class="available-amount">
            <h4>Available amount</h4>
            <p>₹<?=$row['wallet']?></p>
        </div>
    </div>
</body>
</html>