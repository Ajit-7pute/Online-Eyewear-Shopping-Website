<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .product-view{
        width: 80%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        display: flex;
        background:linear-gradient(rgba(120, 203, 255, 0.5), rgba(80, 126, 255, 0.8));
    }
    .product-img-input{
        width: 50%;
        height: 500px;
    }
    .product-img{
        width: 250;
        height: 250px;
        margin: 0 150px;
    }
    .product-img img{
        width: 250px;
        height: 250px;
    }
    
    .product-input{
        display: flex;
        border: .2px solid black;
        gap: 0px;
        border-radius: 2px;
        margin: 0 20px;
    }
    .number-title{
        margin-top: 32px;
        width: 25%;
    }
    .number-title h3{
        margin-top: 37px;
        margin-bottom: 25px;
        font-weight: 300;
    }
    .sph{
        width: 25%;
    }
    .sph h3{
        margin-top: 15px;
        font-weight: 300;
        border-bottom: dashed;
    }
    .sph input{
        width: 100px;
        margin-top: 30px;
        height: 30px;
        margin-left: 10px;
        border: .2px solid black;
        border-radius: 2px;

    }
    .cyc{
        width: 25%;
    }
    .cyc h3{
        margin-top: 15px;
        border-bottom: dashed;
        font-weight: 300;
    }
    .cyc input{
        width: 100px;
        margin-top: 30px;
        height: 30px;
        margin-left: 20px;
        border: .2px solid black;
        border-radius: 2px;

    }
    .axis{
        width: 25%;
    }
    .axis h3{
        margin-top: 15px;
        text-align: center;
        border-bottom: dashed;
        font-weight: 300;
    }
    .axis input{
        width: 100px;
        margin-top: 30px;
        height: 30px;
        margin-left: 25px;
        border: .2px solid black;
        border-radius: 2px;
    }
    .product-detalis{
        width: 50%;
        text-align: center;
    }
    .product-detalis h1{
        font-weight: 200;
        margin-top: 25px;
    }
    .product-detalis h2{
        margin-top: 10px;
    }
    .desc{
        margin-top: 10px;
    }
    .desc h1{
        margin-top: 45px;
    }
    .desc p{
        margin:20px 50px;
    }
    .desc button{
        background: #fff;
        padding: 15px 40px;
        border: .2px solid black;
        border-radius: 5px;
    }
    .desc button:hover{
        background: blueviolet;
    }
    @media (max-width:720px) {
        .product-view{
            flex-direction: column;
        }
        .product-detalis{
            width: 100%;
            margin-top: 250px;
        }
        .product-img{
            margin: 350px 0px 0px 50px;
            width: 200px;
            height: 200px;
        }
        .product-img img{
            width: 200px;
            height: 200px;
        }
        .product-input{
            width: 290px;
            margin: 0 0 0 5px;
        }
        .number-title h3{
            font-size: 10px;
            
        }
        .sph h3{
            font-size: 10px;
        }
        .sph input{
            width: 50px;
        }
        .cyc h3{
            font-size: 10px;
        }
        .cyc input{
            width: 50px;
            margin-left: 15px;
        }
        .axis h3{
            font-size: 10px;
        }
        .axis input{
            width: 50px;
            margin-left: 15px;
        }
    }
</style>
<body>
    <?php
    include_once "header.php";

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $r_sph = $_POST['r_sph'];
        $l_sph = $_POST['l_sph'];
        $r_cyc = $_POST['r_cyc'];
        $l_cyc = $_POST['l_cyc'];
        $r_axi = $_POST['r_axi'];
        $l_axi = $_POST['l_axi'];

        pg_query($con, "insert into cart values($oid, $id, 1, '$r_sph', '$l_sph', '$r_cyc', '$l_cyc', '$r_axi', '$l_axi')") or die(pg_last_error($con));

        echo "<script>alert('Product added to cart successfully');location.href='index.php';</script>";
    }

    $rs = pg_query($con, "select * from product where id=".$_GET['id']);
    $row = pg_fetch_assoc($rs);

    ?>
    <form method="post">
    <div class="product-view">
        <div class="product-img-input">
            <br>
            <div class="product-img">
                <img src="products/<?=$row['id']?>.jpg" alt="">
            </div>
            <br>

            <div class="product-input">
                <div class="number-title">
                    <h3>OD(Right EYE)</h3>
                    <h3>OS(Left EYE)</h3>
                </div>
                <div class="sph">
                    <h3>SPHERE(SPH)</h3>
                    <input type="text" name="r_sph" value="NA">
                    <input type="text" name="l_sph" value="NA">
                </div>
                <div class="cyc">
                    <h3>CYLINDER(CYC)</h3>
                    <input type="text" name="r_cyc" value="NA">
                    <input type="text" name="l_cyc" value="NA">
                </div>
                <div class="axis">
                    <h3>AXIS(AXI)</h3>
                    <input type="text" name="r_axi" value="NA">
                    <input type="text" name="l_axi" value="NA">
                </div>
            </div>
        </div>
         <div class="product-detalis">
            <h1>Model# - <?=$row['model_no']?></h1>
            <h2>₹<?=$row['price']?></h2>
            <div class="desc">
                <h1>More about product</h1>
                <p><?=$row['description']?></p>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <button type="submit" name="submit">Buy Now</button>
            </div>
         </div>
    </div>
    </form>
</body>
</html>