<?php

  if(isset($_POST["submit"])){
  $mail=$_POST['mail'];
  $pass=$_POST['password'];

  $connl=new mysqli('localhost','root','','cashierreg');
    $sel="select * from register where mail='$mail' && password='$pass'";
    $result=mysqli_query($connl,$sel);
    $num=mysqli_num_rows($result);
      if($num==1){
        //echo 'LOGIN SUCCESS';
        header('location: cashier.php');
        }
        else{
          echo '<script>alert("Invalid Username or Password")</script>';
        //echo 'LOGIN FAILED';
        }
      }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BillPay  |  Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login_style.css">
</head>
<body>
  <div class="container">
  
  <section>
  <div class="btns">
    <button id="btn1">Cashier</button>
    <button id="btn2">Admin</button>
  </div>

  
    <form method="POST" class="form1">
      <h4>Cashier Login</h4>
      <input type="email" placeholder="Username" name="mail" id="username" required>
      <hr>
      <p id="require1_1">Please fill the above field</p>
      <p id="require1_2">Please enter a valid email Id</p>
      <input type="password" placeholder="Password" name="password" id="userpass" required>
      <hr>
      <p id="require2">Please fill the above field</p>
      <button id="lgn_btn1" type="submit" name="submit">Log In</button>
    </form>

    <!-- <form methd="POST" class="form2">
      <h4>Admin Login</h4>
      <input type="email" placeholder="Username" name="Amail" id="adminname">
      <hr>
      <input type="password" placeholder="Password" name="Apassword" id="adminpass">
      <hr>
      <button id="lgn_btn2" type="submit" name="Asubmit">LogIN</button>
    </form> -->
    </section>

  </div>
  <script src="loginScript.js"></script>
</body>
</html>