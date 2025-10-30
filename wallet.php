<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wallet</title>
    <style>
        body{
            display: flex;
        }
        .wallet-box{
            width: 400px;
            height: 460px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border: .2px solid black;
            color: #424242;
            border-radius:10px ;
        }
        h1{
            margin-top: 50px;
            text-align: center;
            font-weight: 200;
        }
        .wallet-box h2{
            position: absolute;
            top: 120px;
            left: 35px;
            font-weight: 200;

        }
        .wallet-amount-get{
            text-align: center;
            margin-top: 70px;
        }
        .wallet-amount-get input{
            width: 80%;
            height: 50px;
            padding: 0 0px 0 10px;
            font-size: 25px;
            border: .2px solid black;
            border-radius:5px ;
        }
        .wallet-code{
            text-align: center;
            margin-top: 40px;
        }
        .wallet-code input{
            width: 80%;
            height: 50px;
            padding: 0 0px 0 10px;
            font-size: 25px;
            border: .2px solid black;
            border-radius:5px ;
        }
        .input-button{
            text-align: center;
            margin-top: 50px;
        }
       .input-button input{
        width: 80%;
            height: 50px;
            padding: 0 0px 0 10px;
            font-size: 25px;
            background: #fff;
            border: .2px solid black;
            font-weight: 200;
            border-radius:5px ;
       }
       .input-button input:hover{
        background: #424242;;
       }
       @media (max-width:40em) {
        .wallet-box{
            width: 350px;
        }
        .wallet-box h2{
            top: 150px;
        }
       }
    </style>
</head>
<body>
<?php
        include_once "header.php";

    if(isset($_POST['submit']))
    {
        $id = $_SESSION['uid'];
        $amt = $_POST['amt'];

        pg_query($con, "update users set wallet=wallet+$amt where id=$id");

        echo "<script>alert('Amount added to wallet successfully');location.href='index.php';</script>";
    }
    $rs = pg_query($con, "select * from users where id=".$_SESSION['uid']);
    $row = pg_fetch_assoc($rs);
?>
    <form method="post">
    <div class="wallet-box">
        <h1>Available Balance ₹<?=$row['wallet']?></h1>
        <h2>Amount ₹</h2>
            <div class="wallet-amount-get">
                <input type="text" placeholder="₹ Enter amount" name="amt">
            </div>
            <div class="wallet-code">
                <input type="number" placeholder="Enter code" pattern="\d{3}">
            </div>
        <div class="input-button">
            <input type="submit" value="Submit" name="submit">
        </div>
    </div>
    </form>
</body>
</html>