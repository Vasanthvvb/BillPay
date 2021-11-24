<?php
  $conn=new mysqli('localhost','root','','cashierreg');
  // if($conn)
  // {
  //     echo "connection success";
  // }
  // else
  // {
  //     echo " connection failed";
  // }
session_start();
?>

<?php
  if(isset($_POST["submit"]))
  {

    $sq = "INSERT INTO `register`(`id`, `name`, `mail`, `password`, `address`, `phone`) VALUES ('{$_POST["id"]}','{$_POST["name"]}','{$_POST["mail"]}','{$_POST["password"]}','{$_POST["address"]}','{$_POST["phone"]}')";

    if($conn->query($sq)){
      echo '<script>alert("Cashier added")</script>';
      //echo 'success';
    }
    else{
      //echo 'failed';
    }  
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillPay  |  Admin</title>
  <link rel="stylesheet" href="addCashier.css">
</head>
<body>
  
  <nav>
    <div id="menu">
      <button id="open_btn">
        <img src="menubar_icon.jpg" width="23px" height="18px">
        <h4>Dashboard</h4>
      </button>
    </div>

    <h3>BillPay</h3>
  </nav>

  <div class="container">

    <section class="dashboard">
      <ul>
        <li><a href="addCashier.php">> Add Cashier</a></li>
        <li><a href="updateStock.php">> Update Stock</a></li>
        <li><a href="inventory.php">> Inventory</a></li>
        <li><a href="viewBills.php">> View Bills</a></li>
        <li><a href="login.php">> LogOut</a></li>
      </ul>
      <button id="close_btn">+</button>
    </section>

    <aside class="wrap">
      <div class="cashier-box">
        <h2>Add Cashier Details</h2>
        <form method="POST">
          <div>
            <label for="id">Cashier ID:</label>
            <input type="text" id="cId" name="id" required>
          </div>
          <div>
            <label for="name">Cashier Name:</label>
            <input type="text" id="cName" name="name" required>
          </div>      
          <div>
            <label for="mail">Cashier email:</label>
            <input type="text" id="cMail" name="mail">
          </div>  
          <div>
            <label for="password">Cashier password:</label>
            <input type="password" id="cPass" name="password">
          </div>
          <div>
            <label for="address">Cashier address:</label>
            <input type="text" id="cAdd" name="address">
          </div>
          <div>
            <label for="phone">Cashier phone:</label>
            <input type="text" id="cNo" name="phone">
          </div> 
            <button type="submit" id="add_btn" name="submit">Add Cashier</button>
        </form>
      </div>
      <a href="listCashiers.php">> Show Cashier's List</a>
    </aside>

  </div>

  <script src="addCashier_script.js"></script>
</body>
</html>