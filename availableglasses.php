<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto:wght@300&display=swap');

    * {
        margin: 0;
        padding: 0;

    }

    .product-av {
        width: auto;
        display: flex !important;
        flex-wrap: wrap !important;
        justify-content: space-evenly !important;
        margin: 10px 90px !important;
        gap: 50px !important;
        font-family: 'Poppins', sans-serif !important;
        font-family: 'Roboto', sans-serif !important;
    }

    .h-card {
        width: 300px;
        height: 500px;
        border-radius: 10px;
        border: 1px solid black;
        box-shadow: 0 0 5px 0 #8fc0fbcc !important;
        font-family: 'Poppins', sans-serif !important;
        font-family: 'Roboto', sans-serif !important;
    }

    .product-img {
        width: 300px;
        height: 235px;
        border-radius: 10px;
    }

    .product-img img {
        width: 298px;
        height: 235px;
        border-radius: 10px;
    }

    .product-details {
        width: 300px;
        text-align: center;
    }

    .product-details h1 {
        margin-top: 5px;
    }

    .product-details p {
        margin-top: 5px;
    }

    .product-details h2 {
        color: #8fc0fbcc;
        margin-top: 5px;
    }

    .button-p {
        width: auto;
        height: 40px;
        margin: 25px 30px 0px 30px;
        border-radius: 5px;
    }

    .button-p button {
        width: 100%;
        height: 40px;
        background: #fff;
        border-radius: 5px;
        font-size: 15px;
        transition: 0.5s;
    }

    .button-p button:hover {
        background: #8fc0fbcc;
    }

    .banner {
        width: auto;
        height: 30vh;
        background: #8fc0fbcc;
    }
</style>

<body>

    <div class="banner">
        <?php
        include_once "header.php";
        ?>
    </div>
    <div class="product-av" id="product-av" >
        <?php
            $category = array('Sun glasses', 'Computer glasses', 'Contact Lenses', 'Kids glasses', 'Eye glasses');
            $c = $category[$_GET['cat']-1];
            $con = pg_connect('host=localhost port=5432 dbname=ikart user=postgres password=postgres') or die(pg_last_error());
            $rs = pg_query($con, "select * from product where category='$c'");

            while($row = pg_fetch_assoc($rs)){
        ?>

        <div class="h-card">
            <div class="product-img">
                <img src="products/<?=$row['id']?>.jpg" alt="" width="150" height="100">
            </div>
            <hr>
            <div class="product-details">
                <h2><?=$row['name']?></h2>
                <p><?=$row['description']?></p>
                <h4>₹<?=$row['price']?></h4>
            </div>
            <div class="button-p">
                <a href="product-details.php?id=<?=$row['id']?>">
                    <button>Add to Cart</button>
                </a>
            </div>
        </div>

    <?php }?>
    </div>
    
</body>

</html>