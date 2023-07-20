<?php
        session_start();
        $conn = mysqli_connect('localhost','root','','userdb1');
        if(isset($_POST['update'])){
        $name=$_SESSION['name'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $pno = $_POST['pno'];
        if(strlen(strval($dob))>0 ){
        $select = "update user_form set age=$age,dob='$dob',pno=$pno where name='$name' ";
        if($conn->query($select)==TRUE){
            $_SESSION['name'] = $name;
            header('location:admin_page.php');
        }
        else{
            $error []= 'DATA NOT UPDATED';
        }
        };
    };?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/update_form.css">
</head>
<body>
    <div class="container">
        <div class="content">
        <h2>Update Your Profile</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <?php
            if(isset($error)){
                foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
                };
            };
        ?>
                <br><input type="text" name="age" required placeholder="enter your age">
                <br><input type="date" name="dob" required placeholder="enter your date of birth">
                <br><input type="tel" name="pno" onkeypress="return onlyNumberKey(event)" placeholder="enter your phone number" />
                <br><input type="submit" name="update" onclick="gps()" value="Update" class="form-btn btn-lg">
        </form>
            
        </div>
    </div>

</body>
</html>