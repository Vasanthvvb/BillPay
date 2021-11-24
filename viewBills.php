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
  $sql = "SELECT * FROM customerbill";
  $result = $conn->query($sql);
  $conn->close(); 
?>


<!DOCTYPE html>
<html>
<head>
  <title>Admin  |  Admin</title>
  <link rel="stylesheet" href="viewBills_Style.css">
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
      <div id="title_bar">
        <h3 id="title">Bills of the Day</h3>
        <label class="date">
        <?php
          echo "Date: ";
          echo date('d-m-Y');
        ?>
        </label>
      </div>
      <!-- <hr color="black" id="hr1"> -->

      <div class="view">
        <table>
          <th>Bill No</th>
          <th>Customer Name</th>
          <th>Mobile Number</th>
          <th>Email</th>
          <th>Amount</th>
          <!-- PHP CODE TO FETCH DATA FROM ROWS-->
          <?php   // LOOP TILL END OF DATA 
              while($rows=$result->fetch_assoc())
              {
            ?>
          <tr>
              <!--FETCHING DATA FROM EACH 
                  ROW OF EVERY COLUMN-->
              <td><?php echo $rows['billNo'];?></td>
              <td><?php echo $rows['customerName'];?></td>
              <td><?php echo $rows['customerNo'];?></td>
              <td><?php echo $rows['customerEmail'];?></td>
              <td><?php echo $rows['totalAmount'];?></td>
              <?php
              date_default_timezone_set('Asia/Kolkata');
              date_default_timezone_get();
              ?>
          </tr>
          <?php
              }
            ?>
        </table>
      </div>
    </aside>
  </div>

<script src = viewBills_script.js></script>
</body>
</html>