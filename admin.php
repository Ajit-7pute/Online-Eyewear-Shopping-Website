<?php session_start()?>

<?php
if (isset($_POST['submit'])) {
    $con = pg_connect('host=localhost port=5432 dbname=ikart user=postgres password=postgres');

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = pg_query($con, "select * from admin where admin_email='$email' and admin_pwd='$pass'"
    );
    $row = pg_fetch_assoc($result);

    if ($row) {
        $_SESSION['uid'] = $row['id'];
        $_SESSION['name'] = $row['admin_name'];
        echo "<script>alert('Admin login successful');</script>";
        echo "<script>window.location.href='admin-dashboard.php'</script>";
    } else {
        echo "<script>alert('Admin login failed. Email or password incorrect');</script>";
        echo "<script>window.location.href='admin.php'</script>";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <style>
    body{
        width: 100%;
        height: 100vh;
        background: rgb(215, 233, 255,0.8);
    }
    .sign-in{
        position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 350px;
            height: 420px;
            background: white;
            border-radius: 10px;
            border: 1px solid rgb(181, 181, 181);
    }
    .title-s{
        margin-top: 12px;
        text-align: center;
    }
    .input-box{
        width: auto;
        height: 220px;
        margin: 0 6%;
    }
    .input-box input{
        width: 100%;
        height: 45px;
        border-radius: 5px;
        margin-top: 35px;
        padding: 26px 20px;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        border: 1px solid rgb(181, 181, 181);
    }
    .log-button{
        width: auto;
        margin: 0 6%;
    }
    .log-button button{
        width: 100%;
        padding: 10px 20px;
        background: #2980b9;
        border-radius: 100px;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        border: 1px solid rgb(181, 181, 181);
    }
    .log-button button:hover{
        background: rgb(126, 126, 233);
    }
    .sign-up h2{
        font-size: 20px;
    }
    .sign-up a{
        font-size: 20px;
    }
    .sign-up{
        text-align: center;
        margin-top: 15px;
    }
  </style>
  <body>
    <div class="sign-in">
            <div class="title-s">
                <h6><a href="index.php">Back Home</a></h6>
            </div>
        <form method="POST">
            <div class="title-s">
                <h1>Admin Login</h1>
            </div>
            <div class="input-box">
                <input type="email" name="email" id="" placeholder="Enter email" required>
                <input type="password" name="password" id="" placeholder="Password" required>
            </div>
            <div class="log-button">
                <button type="submit" name="submit">Login</button>
            </div>            
        </form>        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>