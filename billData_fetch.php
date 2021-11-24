<?php
  // Get the user id
  $id = $_REQUEST['id'];

  // Database connection
  $con = mysqli_connect("localhost", "root", "", "cashierreg");

  if ($id != ""){

      // Get corresponding first name and
      // last name for that user id	
      $query ="SELECT name, price, quantity FROM stock WHERE id='$id'";
      $query_run = mysqli_query($con, $query);
      if(mysqli_num_rows($query_run) == 0)
      {
        $name = "No record found";
        $quantity = "";
        $price = "";
      }
      else
      {
        //getting the count of the stock
        $row = mysqli_fetch_array($query_run);
        $count = $row["quantity"];
        if($count <= 0){
          $name = "Out of Stock";
          $price = "";
          $quantity = "";
        }
        else{
          // Get the first field
          $name = $row["name"];
          // Get the second field
          $price = $row["price"];
          // Get the third field
          $quantity = 1;
        }
      }

    // Store it in a array
    $result = array("$name", "$quantity", "$price");
    // Send in JSON encoded form
    $myJSON = json_encode($result);
    echo $myJSON;
  }
?>