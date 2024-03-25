<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login_style.css">
    <link rel="icon" href="./image/logo_store.png" type="image/icon type">
    <title>Sneaker Store | Registor</title>
</head>
<body>
    <section>
        <div class="imgBx">
            <img src="./image/Login_images/Bx.jpg" alt="">
        </div>
        <div class="contentBx">
            <div class="fromBx">
                <h2>Registor</h2>
                <form action="" method="post" autocomplete="off">
                    <label for="name" class="inputBx">
                        <span>Name</span>
                        <input type="text" name="name" id="name" required value="">
                    </label>
                    <label class="inputBx" for="username">
                        <span>Username</span>
                        <input type="text" id="username" name="username" required value="">
                    </label>
                    <label for="email" class="inputBx">
                        <span>Email</span>
                        <input type="email" name="email" id="email" required value="">
                    </label>
                    <label class="inputBx" for="password">
                        <span>Password</span>
                        <input type="password" id="password"  name="password" required value="">
                    </label>
                    <label class="inputBx" for="confirmpassword">
                        <span>Confirm Password</span>
                        <input type="password" id="confirmpassword"  name="confirmpassword" required value="">
                    </label>
                    <label class="inputBx">
                        <input type="submit" name="submit" value="Sign up" class="submit">
                    </label>
                    <div class="inputBx">
                        <p>Have an account? <a href="login.php">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>