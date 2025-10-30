<?php 
    session_start();

	if(!isset($_SESSION["uid"]))
    {
        echo("<script>alert('You are not logged in.')</script>");
        echo("<script>window.location.href='login.php'</script>");
    }

    $con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres");

    $oid = $_POST["oid"];
    $odate = $_POST["odate"];
    $tot = $_POST["tot"];
    $tot1 = $_POST["tot1"];
    $tot2 = $_POST["tot2"];
    $tot3 = $_POST["tot3"];
    $addr = $_POST["addr"];
    $uid = $_SESSION["uid"];

    $rs = pg_query($con, "select wallet from users where id=$uid");
    $row = pg_fetch_row($rs);
    $wamt = $row[0];

    if($wamt - $tot3 >=0)
    {
        pg_query($con, "insert into orders values($oid, '$odate', $tot, $uid, '$addr', 'Pending')");
        pg_query($con, "update users set wallet=wallet-$tot3 where id=$uid");
        
        echo("<script>alert('Your order is placed successfully. Will be delivered within 7 workings days.')</script>");
        echo("<script>window.location.href='index.php'</script>");
    }
    else{
        echo("<script>alert('Insufficient balance in the wallet. Please add amount in wallet')</script>");
        echo("<script>window.location.href='wallet.php'</script>");        
    }
?>

