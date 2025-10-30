<?php session_start()?>

<?php
  $con = pg_connect('host=localhost port=5432 dbname=ikart user=postgres password=postgres');

	$rs = pg_query($con, "select order_id, order_date, first_name, last_name, order_amount, status from orders, users where orders.uid = users.id order by order_id");
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
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

    td, th{
      padding: 10px;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
  	<?php include_once "side-bar.php" ?>
  <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Welcome <b><u><?=$_SESSION["name"]?></u></b></p>
      </div>
      <div class="row" style="padding: 5px;">

        <h3>Orders Received</h3>

        <table id="tableID" class="display" style="width:100%;" border=1>
<thead>
    <tr style="background-color: lightgreen; color: black;">
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Customer Name</th>
        <th>Total Amount</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
<?php
    while($row = pg_fetch_row($rs))
    {
?>
    <tr>
    	<th><?=$row[0]?></th>
    	<th><?=$row[1]?></th>
    	<th><?=$row[2].' '.$row[3]?></th>
    	<th><?=$row[4]?></th>
    	<th><?=$row[5]?></th>
        </tr>
<?php } ?>
</tbody>
</table>
    
      </div>
    </div>
  </div>
</div>

<script>
	
</script>

</body>
</html>
