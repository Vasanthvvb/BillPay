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
  $sql = "SELECT * FROM stock";
  $result = $conn->query($sql); 

  if(isset($_POST["submit"])){
    $id = $_POST["id"];
    $quantity = $_POST["quantity"];
    $sq = "UPDATE stock SET quantity=$quantity WHERE id='$id'";
    if($conn->query($sq)){
      echo '<script>alert("Stock Details updated successfully!")</script>';
    }
    else{
      echo 'failed';
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
  <link rel="stylesheet" href="inventStyle.css">
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

    <aside class="wrapper">

      <div class="info">
        <label>Product Id: </label>
        <input type="text">
        <label>Product name: </label>
        <input type="text">
        <button>Search</button>
      </div>

      <div class="view">
        <table class="table">
            <tr>
                <th>PRODUCT ID</th>
                <th>PRODUCT NAME</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>DESCRIPTION</th>
                <th></th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo $rows['quantity'];?></td>
                <td><?php echo $rows['description'];?></td>
                <td><button id="updItem">Edit</button></td>
            </tr>
            <?php
                }
             ?>
        </table>

        <form method="POST" class="editStock">
          <h4>Edit Stock Details</h4>
          <hr>
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
            <input type="text" id="pInfo" name="description" required>
          </div>
          <div  class="updBtns">
            <button type="submit" id="edit_btn" name="submit">EDIT STOCK</button>
            <button id="close">CLOSE</button>
          </div>
        </form>

      </div>
    </aside>

  </div>


  <script src="invent_script.js"></script>
</body>
</html>