<?php
   session_start();

	if(!isset($_SESSION["uid"])){
        echo("<script>alert('You are not logged in.')</script>");
        echo("<script>window.location.href='signin.php'</script>");
   }

   $tot = $_GET["tot"];

   $con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");
   $rs = pg_query($con, "select count(*) from orders");
   $row = pg_fetch_row($rs);
   $oid = $row[0]+1;

	$rs = pg_query($con, "select current_date");
	$row = pg_fetch_row($rs);
	$odate = $row[0];
?>

<!doctype html>
<html>
   <head>
      <link rel="stylesheet" href="css/bootstrap.css"/>
      <link rel="stylesheet" href="css/style1.css"/>
      <script src="js/bootstrap.js"></script>
      <title>Checkout</title>
   </head>
   
   <body style="background-color: lightgreen;">
      <main>
         <header class="my-5">
            <h2 class="text-center" style="color: black;text-shadow: 2px 2px orangered;font-size: 30px">Pay Bill</h2>
         </header>
         <section class="container">
            <div class="row justify-content-center">
               <div class="order-2 order-lg-1 border">
                  <form method="post" action="order.php">
                     <div class="form-group">
                        <label for="oid">Order ID:</label>
                        <input type="text" class="form-control" name="oid" id="oid" value='<?=$oid?>' readOnly>
                     </div>                     
                     <div class="form-group">
                        <label for="odate">Order Date:</label>
                        <input type="text" class="form-control" name="odate" id="odate" value='<?=$odate?>' readOnly>
                     </div>                     
                     <div class="form-group">
                        <label for="tot">Bill Amount:</label>
                        <input type="text" class="form-control" name="tot" id="tot" value='<?php printf("%.2f",$tot)?>' readOnly>
                     </div>
                     <div class="form-group">
                        <label for="tot3">Final Bill Amount:</label>
                        <input type="text" class="form-control" name="tot3" id="tot3" value='<?php printf("%.2f",$tot)?>' readOnly>
                     </div>
                     <div class="form-group">
                        <label for="oid">Bill Address:</label>
                        <input type="text" class="form-control" name="addr" id="addr" required>
                     </div>                     
                     <div class="form-group" style="padding:15px;">
                        <button type="submit" name="submit" class="btn btn-primary">Confirm Order</button>
                     </div>
                  </form>
               </div>
            </div>
         </section>
      </main>
   </body>
</html>