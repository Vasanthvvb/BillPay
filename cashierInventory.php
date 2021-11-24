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
  $conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillPay  |  Cashier</title>
  <link rel="stylesheet" href="cashierInven.css">
</head>
<body>
  
  <nav>
    <ul>
      <li><a href="cashier.php">Bill</a></li>
      <li><a href="cashierInventory.php">Product Info</a></li>
      <li><a href="login.php">Logout</a></li>
    </ul>
    <h3>BillPay</h3>
  </nav>

  <div class="container">

    <aside class="wrapper">

      <div class="info">
        <label>Product Id: </label>
        <input type="text">
        <label>Product name: </label>
        <input type="text">
        <button>Search</button>
      </div>

      <div class="view">
        <table>
          <tr>
              <th>PRODUCT ID</th>
              <th>PRODUCT NAME</th>
              <th>PRICE</th>
              <th>QUANTITY</th>
              <th>DESCRIPTION</th>
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
          </tr>
          <?php
              }
            ?>
        </table>
      </div>
    </aside>

  </div>


  <script src="inventory_script.js"></script>
</body>
</html>