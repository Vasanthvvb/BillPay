<?php
  $conn=new mysqli('localhost', 'root', '', 'cashierreg');
  $sq = "SELECT * FROM register";
  $query_run = mysqli_query($conn, $sq);

//   if(isset($_POST["submit"])){
//     $id= $_POST["ID"];
//     $sq1 = "DELETE FROM register WHERE id=$id";
//     if($conn->query($sq1)){
//       echo "<script>alert('Deleted')</script>";
//     }
//     else{
//       echo "<script>alert('Not Deleted')</script>";
//     }
//   }
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillPay  |  Admin</title>
  <link rel="stylesheet" href="listCashiers.css">
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

      <?php 
        while($rows=$query_run->fetch_assoc()){
      ?>
        <div class="box">
        <h2><?php echo $rows['name'];?></h2>
        <hr>
        <h4 class="ID" name="ID"><?php echo $rows['id'];?></h4>
        <h4><?php echo $rows['mail'];?></h4>
        <h4><?php echo $rows['password'];?></h4>
        <h4><?php echo $rows['address'];?></h4>
        <h4><?php echo $rows['phone'];?></h4>
        <input type="hidden" id="productId">
        <button class="delete" onclick="funx(this.id)">Delete</button>
        </div>

      <?php
        }
      ?>

    </aside>
  </div>

  <script src="listCashiers.js"></script>
</body>
</html>