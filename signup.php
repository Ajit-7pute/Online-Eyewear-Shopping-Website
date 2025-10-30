<?php session_start()?>

<?php
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];

        $con = pg_connect("host=localhost port=5432 dbname=ikart user=postgres password=postgres password=postgres");

        $result = pg_query($con, "select * from users where email='$email'");
        $row = pg_fetch_row($result);
        if($row)
        {
?>
            <script type="text/javascript">
                alert("Email already registered. Continue to login");
                location.href = "signin.php";
            </script>
<?php
        }
        else
        {
            pg_query($con, "insert into users(first_name, last_name, phone, email, password) values('$fname', '$lname', '$phone', '$email', '$pass')");
    ?>
            <script type="text/javascript">
                alert("User registered successfully. Continue to login");
                location.href = "signin.php";
            </script>
<?php
       }
    }   
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <style>
    body{
        width: 100%;
        height: 100vh;
        background: rgb(215, 233, 255,0.8);
    }
     .sign-up{
         position: absolute;
             top: 50%;
             left: 50%;
             transform: translate(-50%,-50%);
             width: 480px;
             height: 620px;
             background: white;
             border-radius: 10px;
             border: 1px solid rgb(181, 181, 181);
     }
     .title-s{
         margin-top: 15px;
         text-align: center;
     }
     .input-box{
         width: auto;
         height: 400px;
         margin: 0 6%;
     }
     .input-box input{
         width: 100%;
         height: 45px;
         border-radius: 5px;
         margin-top: 20px;
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
    @media (max-width:40em) {
        .sign-up{
            width: 350px;
        }
     }
     .sign-up-text{
        width: auto;
        text-align: center;
        font-size: 20px;
        text-decoration: none;
        margin:20px 50px 0 50px;
        text-decoration: none;
        border: 0.3px solid #96958c;
        border-radius: 5px;
    }
    .sign-up-text a{
        text-decoration:none;
        color:#767676;
        padding: 10px 0;
    }
    .sign-up-new h2{
        font-size: 20px;
    }
    .sign-up-new a{
        font-size: 20px;
    }
    .sign-up-new{
        text-align: center;
        margin-top: 15px;
    }
   </style>
   <body>
     
     <div class="sign-up">
            <div class="title-s">
                <h5><a href="index.php" style="font-size: 15px;">Back Home</a></h5>
            </div>
        <form method="POST">
            <div class="title-s">
                <h1>Sign Up</h1>
            </div>
         <div class="input-box">
             <input type="text" name="fname" id="" placeholder="First Name" required>
             <input type="text" name="lname" id="" placeholder="Last Name" required>
             <input type="email" name="email" id="" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required > 
             <input type="password" name="pass" id="" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
             <input type="text" name="phone" id="" placeholder="Phone Number" pattern="^[6789]\d{9}$" required>
         </div>
         <div class="log-button">
             <button type="submit" value="submit" name="submit">Submit</button>
         </div>

        <div class="sign-up-new">
            <h2>Have an account?<a href="signin.php">Login here</a></h2>
        </div>

        </form>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   </body>
 </html>