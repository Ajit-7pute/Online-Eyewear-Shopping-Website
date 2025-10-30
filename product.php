<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .services-page {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            position: absolute;
            gap: 1px;
            justify-content: space-evenly;
        }

        .services-page a {
            text-decoration: none;
            color: #000000;
            cursor: pointer;
            border: 0.5px solid #000000;
            width: 350px;
            height: 370px;
            margin: 10px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
        }

        .ser-img {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ser-img img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
        }

        .ser-text {
            text-align: center;
            margin-top: 5px;
        }

        .method-banner {
            width: auto;
            min-height: 300px;
            background-image: url("https://img.freepik.com/free-vector/abstract-watercolor-pastel-background_87374-139.jpg?w=360");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .text-box {
            width: 100%;
            color: #000000;
            position: absolute !important;
            top: 18% !important;
            left: 18% !important;
            transform: translate(-18%, -18%) !important;
            text-align: center !important;

        }

        .text-box h1 {
            font-size: 52px;
        }

        .text-box p {
            margin: 10px 0 40px;
            font-size: 12px;
            color: #000000;
        }

        @media (max-width:60em) and (min-width:20em) {
            .text-box {
                font-size: 18px !important;
                top: 8%;
                left: 8%;
                transform: translate(-8%, -8%);
            }
        }

        .method-banner{
            background: linear-gradient(rgba(120, 203, 255, 0.5), rgba(80, 126, 255, 0.8)) ;
        }
    </style>
</head>

<body>
    <?php
    include_once "header.php";
    ?>
    <div class="method-banner">
        <div class="text-box">
            <h1>Choose Category</h1>
            <p>Choose your category and start exploring wide range of glasses.</p>
        </div>
    </div>
    <section class="services-page" id="services-page">
        <a href="availableglasses.php?cat=1">
            <div class="services-section">
                <div class="ser-img">
                    <img src="https://static1.lenskart.com/media/desktop/img/Apr22/vc_sun_8.jpg" alt="">
                </div>
                <div class="ser-text">
                    <h1>Sun glasses</h1>
                </div>
            </div>
        </a>
        <a href="availableglasses.php?cat=2">
            <div class="services-section">
                <div class="ser-img">
                    <img src="https://images.ctfassets.net/u4vv676b8z52/6SHFZHY04ijnfZToBs88lT/a3bb9a5e380956e1cca75b9a9cccc8e1/photchromic-computer-glasses-hero-compressor.jpg?fm=jpg&q=80" alt="">
                </div>
                <div class="ser-text">
                    <h1>Computer glasses</h1>
                </div>
            </div>
        </a>
        <a href="availableglasses.php?cat=3">
            <div class="services-section">
                <div class="ser-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTP-P2t_b_F0U2Eaod2C38MmLGgYG1WTW2AOjStxxcyXXJeRBbfunhPFiq_r2oSWK3NcrM&usqp=CAU" alt="">
                </div>
                <div class="ser-text">
                    <h1>Contact Lenses</h1>
                </div>
            </div>
        </a>
        <a href="availableglasses.php?cat=4">
            <div class="services-section">
                <div class="ser-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnLnu5tCvp2lz824nzbeReLTDrId5cUF9eIg&usqp=CAU" alt="">
                </div>
                <div class="ser-text">
                    <h1>Kids glasses</h1>
                </div>
            </div>
        </a>
        <a href="availableglasses.php?cat=5">
            <div class="services-section">
                <div class="ser-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_N7HBQJkrq140WPsQJOd8rqN2i29CfBKT_Q&usqp=CAU" alt="">
                </div>
                <div class="ser-text">
                    <h1>Eye glasses</h1>
                </div>
            </div>
        </a>
    </section>
</body>

</html>