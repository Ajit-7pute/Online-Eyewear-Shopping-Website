<?php  
  $con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");
  $rs = pg_query($con, "select count(*) from orders");
  $row = pg_fetch_row($rs);
  $oid = $row[0]+1;
  $rs = pg_query($con, "select * from cart where oid=$oid");
  $n = intval(pg_num_rows($rs));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
</head>
<style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.main_box .sidebar_menu{
  position: fixed !important;
  height: 100vh !important;
  width: 280px !important;
  left: -290px !important;
  background: rgb(215, 233, 255,0.5) !important;
  box-shadow: 0px 0px 6px rgba(255, 255, 255, 0.5) !important;
  overflow: hidden !important;
  transition: 0.5s ease !important;
  z-index: 1 !important;
}
.sidebar_menu .logo{
  position: absolute !important;
  width: 100% !important;
  height: 60px !important;
}
.sidebar_menu .logo a{
  color: #fff !important;
  font-size: 35px !important;
  font-weight: 500 !important;
  position: absolute !important;
  left: 50px !important;
  line-height: 60px !important;
  text-decoration: none !important;
}
.sidebar_menu .menu{
  position: absolute !important;
  top: 80px !important;
  width:100% !important;
}
.sidebar_menu .menu li{
  margin-top: 6px !important;
  padding: 14px 20px !important;
  width: auto !important;
  margin:0 10px !important;
}
.sidebar_menu .menu i{
  color: black !important;
  font-size: 20px !important;
  padding-right: 8px !important;
}
.sidebar_menu .menu a{
  color: #5c5c5c !important;
  font-size: 20px !important;
  text-decoration: none !important;
}
.sidebar_menu .menu li:hover{
  border: 0.5px solid rgb(67, 67, 67) !important;
}
.sidebar_menu .log-out{
  position: absolute !important;
  left: 50% !important;
  transform: translateX(-50%) !important;
  bottom: 20px !important;
  list-style: none !important;
  cursor: pointer !important;
}
.sidebar_menu .log-out i{
  text-decoration: none !important;
  padding: 0 5px !important;
  color: black !important;
  opacity: 0.6 !important;
  font-size: 35px !important;
}
.sidebar_menu .log-out i:hover{
  opacity: 1 !important;
  transition: all 0.2s linear !important;
  transform: scale(1.01)!important;
}
#check{
  display: none !important;
}
.main_box .btn_one i{
  color: black !important;
  font-size: 30px !important;
  font-weight: 700 !important;
  position: absolute !important;
  left: 16px !important;
  line-height: 60px !important;
  cursor: pointer !important;
  opacity: 1 !important;
  transition: all 0.3s linear !important;  
}
 .sidebar_menu .btn_two i{
  font-size: 25px !important;
  line-height: 60px !important;
  position: absolute !important;
  left: 240px !important;
  cursor: pointer !important;
  opacity: 0 !important;
  transition: all 0.5s linear !important;
}

.log-out{
  font-size: 25px !important;
}
.menu ul{
  padding: 0 !important;
}
.menu ul li{
  list-style-type: none !important;
}
.log-out a{
  text-decoration: none !important;
  color:#5c5c5c !important;
  position: relative !important;
  top: -5px !important;
}
.btn_one i:hover{
  font-size: 29px !important;
}
.btn_two i:hover{
  font-size: 24px !important;
}
#check:checked ~ .sidebar_menu{
  left: 0px !important;
}
#check:checked ~ .btn_one i{
  opacity: 0 !important;
}
#check:checked ~ .sidebar_menu .btn_two i{
  opacity: 1 !important;
}

.btn_two i{
  color: black !important;
}
.text-box{
  width: 100%;
  color: #424242;
  position: absolute;
  top: 40%;
  left: 40%;
  transform: translate(-40%,-40%);
  text-align: center;
}
.text-box h1{
  font-size: 62px;
}
.text-box p{
  margin: 10px 0 40px;
  font-size: 14px;
  color: #424242;
}
.hero-btn{
  display: inline-block;
  text-decoration: none;
  color: #424242;
  border: 1px solid #000000;
  padding: 12px 34px;
  font-size: 13px;
  background: transparent;
  position: relative;
  cursor: pointer;
}
.hero-btn:hover{
  border: 1px solid #d6f2fb;
  background: #b6e7f7;
  transition: 1s;
}
@media (max-width:40em) {
  .main_box .sidebar_menu{
    z-index: 1 !important;
    background: rgb(184, 216, 255) !important;
  }
}
</style>
<body>
<section class="side-nav">
  <div class="main_box">
    <input type="checkbox" id="check">
    <div class="btn_one">
      <label for="check">
        <i class="fa fa-bars"></i>
      </label>
    </div>
    <div class="sidebar_menu">
      <div class="logo">
        <a href="#">ikart</a>
          </div>
        <div class="btn_two">
          <label for="check">
            <i class="fa fa-times" aria-hidden="true"></i>
          </label>
        </div>
      <div class="menu">
        <ul>
          <li><i class="fa fa-home" aria-hidden="true"></i>
            <a href="index.php">Home</a>
          </li>
          <?php if(!isset($_SESSION['uid'])){?>
          <li>
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="signin.php">Login</a>
          </li>
          <?php }?>
          <li>
            <i class="fa fa-chain-broken" aria-hidden="true"></i>
            <a href="product.php">Our Produts</a>
          </li>
          <li>
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            <a href="cart.php">Cart (<?=$n?>)</a>
          </li>         
          <?php if(isset($_SESSION['uid'])){?>
          <li>
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="profile.php">Profile</a>
          </li>
          <li>
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <a href="wallet.php">Wallet</a>
          </li>
          <li>
            <i class="fa fa-credit-card" aria-hidden="true"></i>
            <a href="track-order.php">Track Order</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['uid'])){?>          
          <li>
            <i class="fa fa-question" aria-hidden="true"></i>
            <a href="about.php">About</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['uid'])){?>          
          <li>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <a href="contact.php">Contact</a>
          </li>
          <?php }?>
          <?php if(!isset($_SESSION['uid'])){?>          
          <li>
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="admin.php">Admin</a>
          </li>
        <?php }?>
        </ul>
      </div>
      <?php if(isset($_SESSION['uid'])){?>

      <div class="log-out">
        <i class="fa fa-sign-in" width="100px"; aria-hidden="true"></i>
        <a href="logout.php">Logout</a>
      </div>
      <?php }?>
    </div>
  </div>
</section>
</body>
</html>