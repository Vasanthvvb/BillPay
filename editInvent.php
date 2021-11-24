<?php
  // Get the user id
  $id = $_REQUEST['id'];

  // Database connection
  $con = mysqli_connect("localhost", "root", "", "cashierreg");

  if ($id != ""){

      // Get corresponding first name and
      // last name for that user id	
      $query ="SELECT id, name, price, quantity, description FROM stock WHERE id='$id'";
      $query_run = mysqli_query($con, $query);
      if(mysqli_num_rows($query_run) != 0)
      {
        //getting the count of the stock
        $row = mysqli_fetch_array($query_run);
        //Get the first field
        $Id = $row["id"];
        // Get the second field
        $name = $row["name"];
        // Get the third field
        $price = $row["price"];
        // Get the fourth field
        $quantity = $row["quantity"];
        //Get the fifth value
        $description = $row["description"];
      }

      // Store it in a array
      $result = array("$Id", "$name", "$quantity", "$price", "$description");
      // Send in JSON encoded form
      $myJSON = json_encode($result);
      echo $myJSON;
  }
?>