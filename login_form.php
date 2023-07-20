<?php
$conn = mysqli_connect('localhost','root','','userdb1');
session_start();
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $error1[] = 'email or password!';
         $_SESSION['name'] = $row['name'];
         header('location:admin_page.php');

      }
   else{
      $error[] = 'incorrect email or password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/login_form.css">

</head>
<body>

<div class="form-container">
   <form class="form-group" action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email"  required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn btn-lg">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>