<?php
$conn = mysqli_connect('localhost','root','','userdb1');
session_start();
$name=$_SESSION['name'];
$select = " SELECT * FROM user_form WHERE name='$name' ";
$result = $conn->query($select);
if($result->num_rows>0){
   $d1=$result->fetch_assoc()['age'];
}
$name=$_SESSION['name'];
$select = " SELECT * FROM user_form WHERE name='$name' ";
$result = $conn->query($select);
if($result->num_rows>0){
   $d2=$result->fetch_assoc()['dob'];
}
$name=$_SESSION['name'];
$select = " SELECT * FROM user_form WHERE name='$name' ";
$result = $conn->query($select);
if($result->num_rows>0){
   $d3=$result->fetch_assoc()['pno'];
}

if(!isset($_SESSION['name'])){
   header('location:login_form.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/admin_form.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
   <br>
   
      
   <div class="content">
      <h1>welcome <span><?php echo $_SESSION['name'] ?></span></h1>
      <a href="logout.php" class="btn btn-lg">logout</a>
      <br>
      <br>  <label for="">AGE:</label> <span><?php echo $d1; ?></span>
      <br> <label for="">DATE OF BIRTH:</label> <span><?php echo $d2; ?></span>
      <br> <label for="">CONTACT NO:</label><span><?php echo $d3; ?></span>
      <br>
      <br><a href="update_form.php" class="btn btn-lg">Update Profile</a>
      <?php
      $conn = mysqli_connect('localhost','root','','userdb1');
      $name=$_SESSION['name'];
      $select = " SELECT * FROM user_form WHERE name='$name' ";
      $result = $conn->query($select);
      if($result->num_rows>0){
         $_SESSION['name']=$result->fetch_assoc()['name'];
      }
      ?>
   </div>
</div>
</body>
</html>