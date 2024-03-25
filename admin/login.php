<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonynous"></script>
    <link rel="stylesheet" href="./css/login_style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="./image/logo_store.png" type="image/icon type">
    <title>Sneaker Store | Login</title>
</head>
<body>
<section>
        <div class="imgBx">
            <img src="./image/Login_images/Bx.jpg">
        </div>
        <div class="contentBx">
            <div class="fromBx">
                <h2>Login</h2>
                <form action="" method="post" autocomplete="off">
                    <label class="inputBx" for="usernameemail">
                        <span>Username or Email:</span>
                        <input type="text" name="usernameemail" id="usernameemail"  required>
                    </label>
                    <label class="inputBx" for="password">
                        
                        <span>Password:</span>
                        <input type="password" name="password" id="password"require>
                    </label>
                    <label class="remember">
                        <label><input type="checkbox">Remember Password</label>
                    </label>
                    <label class="inputBx" for="submit">
                        <input type="submit" name="submit" value="Sign in">
                    </label>
                    <div class="inputBx">
                        <p>Don't have an account? <a href="regis.php">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>