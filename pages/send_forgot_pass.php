<?php
  include_once 'includes/session.php';
  $connectReg = mysqli_connect('localhost', 'root', '', 'registration');
  // If the email field has been set
  // Reference : https://stackoverflow.com/questions/4356289/php-random-string-generator
  $_SESSION['invalid'] = '';
  if(isset($_POST['emailField'])) {
    $e = $_POST['emailField'];
    // Create a random string of characters
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    // Testing echo
    echo 'This is your new password: '.$randomString;

    // Need to check if the email address exists in the database
    $sql = "SELECT * FROM users WHERE email='$e'";
    $result = mysqli_query($connectReg, $sql);
    if(mysqli_num_rows($result) > 0) {
  		while($row = mysqli_fetch_array($result)) {
  			//echo $row['item_ids'];
        $email = $row['email'];
        echo $email;
        if($email == $e) {
          //MD5 string of characters
          $md5Password = md5($randomString);
          $sql2 = "UPDATE users SET password='$md5Password' WHERE email='$e'";
          $result = mysqli_query($connectReg, $sql2);
          "<script>alert('Password has been updated and stored in database');</script>";
          // Need to be redirected back to the home page
          /* Get email and use sql statement to
            find the associated password
          */
          // Send new password to given email
          $email_to = $_POST['emailField'];
          $email_subject = "Password Recovery";

          $email_message = "Form details below.\n\n";
          $email_message .= "New Password: ".$randomString;

          // create email headers
          $headers = 'From: alexmsmith0@gmail.com'."\r\n".
          'Reply-To: <$email_to>'."\r\n" .
          'X-Mailer: PHP/' . phpversion();
          @mail($email_to, $email_subject, $email_message, $headers);
          ?>
          <?php
          header('location: home.php');
        }
      }

  	}else {
      header('location: forgot.php');
    }

  }
?>
