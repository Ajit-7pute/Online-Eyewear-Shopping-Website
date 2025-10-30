<?php
  session_start();

  if(!isset($_SESSION["uid"])){
    header("Location: index.php");
		return;
	}

  $con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");

  $result = pg_query($con, "select * from users");
  $noc = pg_num_rows($result);

	$result = pg_query($con, "select * from product");
	$nop = pg_num_rows($result);

	$result = pg_query($con, "select distinct category from product");
	$nocat = pg_num_rows($result);

	$result = pg_query($con, "select * from orders");
	$noo = pg_num_rows($result);

	$result = pg_query($con, "select * from contact");
	$nof = pg_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 750px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: lightgreen;
      height: 100%; 
    }
     
    .sidenav a{
      text-decoration: none;
      font-size: 15px;
      padding: 10px;
      font-family: sans-serif;
      line-height: 35px;
      color: red;
    }   
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }

    .well{
      background: lightyellow;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">

	<?php include_once "side-bar.php" ?>

   <br>
    
    <div class="col-sm-8">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Welcome <b><u><?=$_SESSION["name"]?></u></b></p>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">

            <h4><img src="images/users.png" width="50" height="50"> Total Customers</h4>
            <p><?=$noc?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4><img src="images/category.png" width="50" height="50"> Total Category</h4>
            <p><?=$nocat?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4><img src="images/products.png" width="50" height="50"> Total Products</h4>
            <p><?=$nop?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4><img src="images/orders.png" width="50" height="50"> Total Orders</h4>
            <p><?=$noo?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4><img src="images/feedbacks.png" width="50" height="50"> Total Feedbacks</h4>
            <p><?=$nof?></p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
