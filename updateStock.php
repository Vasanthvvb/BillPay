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

    $sq = "INSERT INTO `stock`(`id`, `name`, `price`, `quantity`, `description`) VALUES ('{$_POST["id"]}','{$_POST["name"]}','{$_POST["price"]}','{$_POST["quantity"]}','{$_POST["description"]}')";

    if($conn->query($sq)){
      echo '<script>alert("New Stock Added")</script>';
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
  <link rel="stylesheet" href="stock_update.css">
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
        <h2>Add New Stock</h2>
        <form method="POST">
          <div>
            <label for="id">Product ID:</label>
            <input type="text" id="pId" name="id" required>
          </div>
          <div>
            <label for="name">Product Name:</label>
            <input type="text" id="pName" name="name" required>
          </div>      
          <div>
            <label for="mail">Price:</label>
            <input type="text" id="pPrice" name="price" required>
          </div>  
          <div>
            <label for="password">Quantity:</label>
            <input type="text" id="pQuantity" name="quantity" required>
          </div>
          <div>
            <label for="address">Description:</label>
            <input type="text" id="pinfo" name="description" required>
          </div>
          <button type="submit" id="add_btn" name="submit">ADD PRODUCT</button>
        </form>
      </div>
    </aside>

  </div>



  <script src="updateStock_script.js"></script>
</body>
</html>