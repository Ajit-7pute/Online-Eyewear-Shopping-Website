<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header('Location: index.php');
    return;
}

$con = pg_connect(
    'host=localhost port=5432 dbname=ikart user=postgres password=postgres'
);

$rs = pg_query($con, 'select * from product where id=' . $_GET['id']);
$row = pg_fetch_assoc($rs);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $model = $_POST['model'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    pg_query(
        $con,
        "update product set model_no='$model', name='$name', description='$description', price=$price, category='$category' where id=$id"
    );

    if(isset($_FILES['imgurl']['tmp_name']))
    {
      $target_file = $id . '.jpg';
      unlink('products/' . $target_file);
      move_uploaded_file($_FILES['imgurl']['tmp_name'], 'products/' . $target_file);      
    }

    header('Location: products.php');
}

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
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
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
  	<?php include_once 'side-bar.php'; ?>
  <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Welcome <b><u><?= $_SESSION['name'] ?></u></b></p>
      </div>
      <div class="row" style="padding: 5px;">

<form method='post' enctype="multipart/form-data">
<table class="table" align='center' width="50%">
<tr>
	<td><b>ID:</b></td>
	<td><input type='text' name='id' value="<?= $row['id'] ?>" readOnly></td>
</tr>
<tr>
  <td><b>Model#:</b></td>
  <td><input type='text' name='model' value="<?=$row['model_no']?>" required pattern="^[A-Z]{2}-\[A-Z]\d{5}$"></td>
</tr>
<tr>
	<td><b>Name:</b></td>
	<td><input type='text' name='name' value="<?=$row['name']?>" required></td>
</tr>
<tr>
	<td><b>Description:</b></td>
	<td><input type='text' name='description' value="<?=$row['description']?>" required></td>
</tr>
<tr>
	<td><b>Price:</b></td>
	<td><input type='number' name='price' min=500 value="<?=$row['price']?>" required></td>
</tr>
<tr>
	<td><b>Category:</b></td>
	<td>
    <select name="category" required>
      <option value="<?=$row['category']?>"><?=$row['category']?></option>
      <option value="">Select Category</option>
      <option value="Sun glasses">Sun glasses</option>
      <option value="Eye glasses">Eye glasses</option>
      <option value="Kids glasses">Kids glasses</option>
      <option value="Computer glasses">Computer glasses</option>
      <option value="Contact Lenses">Contact Lenses</option>
    </select>
  </td>
</tr>
<tr>
	<td><b>Photo:</b></td>
	<td><input type='file' name='imgurl'></td>
  <td><b>Old Image</b><img src='products/<?= $row[
      'id'
  ] ?>.jpg' alt="" width=150 height=100></td>
</tr>
<tr>
	<td align='center'><input type='submit' value='UPDATE' class='btn btn-warning' name="submit"></td>
	<td align='center'><input type='reset' value='CLEAR' class='btn btn-warning'></td>
</tr>
</table>
</form>
    
      </div>
    </div>
  </div>
</div>

</body>
</html>
