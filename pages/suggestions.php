<?php
  // Connection to shopping database
  $connect = mysqli_connect('localhost', 'root', '', 'shopping');

  $existingNames = array();

  // SQL statement
  $sql = 'SELECT * FROM tbl_product';
  // Query statement with db connection
  $result = mysqli_query($connect, $sql);
  // If there are results
  if(mysqli_num_rows($result) > 0) {
    // While fetching the result
    while($row = mysqli_fetch_assoc($result)) {
      // Push item names to array from db
      $row['name'];
      array_push($existingNames, strtolower($row['name']));
    }
    // Check if we have a post method
    if(isset($_POST['suggestion'])) {
      $name = strtolower($_POST['suggestion']);

      if(!empty($name)){
        foreach($existingNames as $existingName){
          /* For every character that is entered as input, it will match to the
            position of the array 'existingNames'.
          */
          if(strpos($existingName, $name) !== false){
            if($existingName == strtolower('Samsung J2 Pro')) {
              echo "<a href='https://www.youtube.com/watch?v=r_AqoZOo0rA&t=0s'>$existingName</a>";
            }
            if($existingName == strtolower('HP Notebook')) {
              echo "<a href='https://stackoverflow.com/questions/18916966/add-php-variable-inside-echo-statement-as-href-link-address'>$existingName</a>";
            }
            if($existingName == strtolower('Nintendo Switch - Red & Blue')) {
              echo "<a href='https://www.youtube.com/watch?v=r_AqoZOo0rA&t=0s'>$existingName</a>";
            }
            if($existingName == strtolower('Lenovo Yoga Book 10.1" Black Touch Laptop')) {
              echo "<a href='https://mail.google.com/mail/u/1/#inbox'>$existingName</a>";
            }
            if($existingName == strtolower('LG 43UJ630V 43 inch 4K Ultra HD HDR Smart LED TV (2017 Model)')) {
              echo "<a href='https://github.com/alexmsmith'>$existingName</a>";
            }
            if($existingName == strtolower('PlayStation-4 Pro')) {
              echo "<a href='https://developer.paypal.com/docs/classic/adaptive-payments/ht_ap-embeddedPayment-curl-etc/'>$existingName</a>";
            }
            echo '<br>';
          }
        }
      }
    }
  }
