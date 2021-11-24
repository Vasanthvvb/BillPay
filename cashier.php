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

  //Quantity count in database:
  if(isset($_POST['form_quantity']) && isset($_POST['form_id']))
  {
    $id = $_POST['form_id'];
    $quantity = $_POST['form_quantity'];
    $sq = "UPDATE stock SET quantity = quantity-$quantity WHERE id = '$id'";
    if($conn->query($sq)){
      echo "success";
    }
    else{
      echo "failed";
    }
  }
?>

<?php
    //Store Bill in Database:
    if(isset($_POST["submit1"]))
    {
      $sq="INSERT INTO `customerbill`(`customerName`, `customerNo`, `customerEmail`, `totalAmount`) VALUES ('{$_POST["customerName"]}','{$_POST["number"]}','{$_POST["email"]}','{$_POST["total"]}')";
      if($conn->query($sq)){
        echo '<script>alert("Bill saved")</script>';
        //echo 'success';
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
  <title>BillPay  |  Cashier</title>
  <link rel="stylesheet" href="cashier_Style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://smtpjs.com/v3/smtp.js"></script>
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
    <section id="section1">
    <!-- onsubmit="event.preventDefault(); validateEmail()" -->
      <form class="form1" method="POST" action="" onsubmit="return kaduppu();">
        <h3>Billing</h3>
          <label>Product Id:</label>
          <input type="text" id="id" name="id"
          onkeyup="GetDetail(this.value)" value="" required>
          <label>Product name:</label>
          <input type="text" id="name" name="name" value="" required>
          <label>Quantity:</label>
          <input type="text" id="quantity" name="quantity" onclick="myFunction()" value="" required>
          <label>Amount:</label>
          <input type="text" id="price" name="price" value="" required>
          <button type="submit" id="submit" name="submit">ADD</button>
        </form>
      <!-- Cam Scanner -->
      <div class="container">
      <div class="camScan">
        <video autoplay="true" id="videoElement">
	
	      </video>
        <h1>QR SCANNER</h1>
        <button id="on_btn">Turn On</button><br>
        <button id="off_btn">Turn Off</button>
      </div>
      <button class="btn" id=mailBtn onclick="sendEmail()">Mail the Bill</button>
      <button class="btn">SMS the bill</button>
      </div>
    </section>

  <div class="clr"></div>
<!-- Customer details and bill -->
  <section id="section2"> 
    <form class="form2" method="POST">
      <h3>Customer Detail</h3>
        <div>
          <label>Customer Name:</label>
          <input type="text" name="customerName" id="customerName">
          <label>Contact No:</label>
          <input type="number" name="number">
        </div>
      <label>Email Id:</label>
      <input type="email" name="email" id="customerMail">
      <input type="hidden" name="total" id="total">
      <button type="submit" name="submit1">STORE</button>
    </form>
    <hr>  

    <div class="viewBill">
      <section class="wrapper">
        <h3>ShopCart</h3>
        <h4>A descripted invoice for your purchase</h4>
        <label class="date">
          <?php
            echo "Date: ";
            echo date('d-m-Y');
          ?>
        </label>
        <label class="time">
          <?php
            date_default_timezone_set('Asia/Kolkata');
            date_default_timezone_get();
            echo "Time: ";
            echo date('H:i a');
          ?>
        </label>
        <div class="clr"></div>
        <hr>

        <!-- Table to view the bill -->
        <table id="billTable">
          <tr>
            <th>S.No</th>
            <th>Items</th>
            <th>Quantity</th>
            <th>Amount</th>
          </tr>
        </table>
        <hr>
      </section>

      <label id="total">Total Amount: </label>
      <input type="text" id="totalamount" value="0.00" name="totalAmount">
    </div>

  </section>

  </div>

  <script src="cashierScript.js"></script>

</body>
</html>