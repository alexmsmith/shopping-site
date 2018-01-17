<?php
  include 'db.php';
  session_start();
  if(isset($_SESSION['current_basket'])) {
    $current_basket = unserialize($_SESSION['current_basket']);
  }else {
    $current_basket = array();
  }

  /* When the visitor adds an item to the basket, we just
      need the item's ID in your database and add it into the
      current_basket array.
  */
  
?>
