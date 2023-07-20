<?php
$conn = mysqli_connect('localhost','root','','userdb1');
if(isset($_POST['submit'])){
   $message=array('name'=>$_POST['name'],
   'email'=>$_POST['email'],
    'password'=>$_POST['password'],
    'age'=>$_POST['age'],
    'dob'=>$_POST['dob'],
     'pno'=>$_POST['pno']
   );
   if(filesize("message.json")==0){
      $first_record=array($message);
      $data_to_save=$first_record;
   }
   else{
      $old_records=json_decode(file_get_contents("message.json"));
      array_push($old_records,$message);
      $data_to_save=$old_records;
   }
   file_put_contents("message.json",json_encode($data_to_save,JSON_PRETTY_PRINT),LOCK_EX);
   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   $age = $_POST['age'];
   $dob = $_POST['dob'];
   $pno = $_POST['pno'];
  
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password ,age,dob,pno) VALUES('$name','$email','$pass','$age','$dob','$pno')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/register_form.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="text" name="age" required placeholder="enter your age">
      <input type="date" name="dob" required placeholder="enter your date of birth">
      <input type="tel" name="pno" onkeypress="return onlyNumberKey(event)" placeholder="enter your phone number" />
      <input type="submit" name="submit"  value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>
</body>

</html>