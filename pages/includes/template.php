<?php
  $connectReg = mysqli_connect('localhost', 'root', '', 'registration');
  // We need to retrieve 'item_ids' from database of the specified username
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $basket = array();
    $quer = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connectReg, $quer);
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        $ids = $row['item_ids'];
        // Split 'item_ids' to individual ids representing each product
        $ids_split = str_split($ids, 1);
        // Foreach, push to array
        foreach ($ids_split as $key => $value) {
          array_push($basket, $value);
        }
        $_SESSION['cart'] = $basket;
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css.css">
		<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Need to check whether I still need to keep 3.2._ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Used for the internal data and time -->
		<script src="time.js"></script>

    <script>
			/*	Search bar functionality	*/
				// Load the document before the script executes
				$(document).ready(function(){
					// Keyup action on input box
					$('#search').keyup(function(){
						// Name is equal to the value of the input box
						var name = $('#search').val();
						// POST method (target: 'suggestions.php')
						$.post('suggestions.php', {
							// Suggestion is posted to 'suggestions.php'
							suggestion: name
						}, function(data, status) {
							$('#searchResults').html(data);
						});
					});
				});
		</script>
  </head>
  <body>
    <div class="container-fluid">
			<nav class="navbar navbar-inverse" style="position: fixed; left: 0px; width: 100%; background-color: black; opacity: 0.8;
				border: none; border-top-left-radius: 0px; border-top-right-radius: 0px;">
    	<div class="navbar-header">
      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
      	</button>
    	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
      	<ul class="nav navbar-nav">
        	<li id="listHome" style="font-size: 13px;"><a href="home.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
        	<li id="menuItem" style="font-size: 13px;"><a href="shopping.php">Shopping <span class="glyphicon glyphicon-gift"></span></a></li>
					<li id="menuItem" style="font-size: 13px; "><a href="contact.php">Contact <span class="glyphicon glyphicon-envelope"></span></a></li>
          <li id="menuItem" style="font-size: 13px;"><a href="account.php">Account <span class="glyphicon glyphicon-cog"></span></a></li>
      	</ul>
				<!-- Product search bar -->
				<input id="search" type="text" name="search" placeholder="Search for a product.."/>
				<!-- Displays the search result(s) -->
				<div id="searchDiv">
					<p id="searchResults"></p>
				</div>

      	<ul class="nav navbar-nav navbar-right">
					<li id="menuItem" style="font-size: 13px;"><a href="calculate.php">Calculator</a></li>
					<li id="menuItem" style="font-size: 13px;"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login / Register</a></li>
					<a href="basket.php"><span class="glyphicon glyphicon-shopping-cart" style="font-size: 28px; margin-top: 10px; margin-left: 5px;"></span></a>
					<!-- Basket counter -->
					<div class="basket_counter">
						<?php
							if(isset($_SESSION['username'])) {
								$basket = implode("",$_SESSION['cart']);
								$_SESSION['counter'] = $basket;
								?><span class="label" style="padding:2px; margin-left: -12px; font-size: 14px;"><?php echo strlen($_SESSION['counter']); ?></span>
								<?php
							}
								?>
					</div>
					<div id="welcome" style="float: right; margin-left: 16px;">
						<!-- Logged in user information -->
						<?php if (isset($_SESSION['username'])) : ?>
						<p style="font-size: 14px;">
							Welcome <strong><?php echo $_SESSION['username']; ?>!</strong>
							<!-- Logout account link -->
							<b><a href="home.php?logout='1'" style="color: red; text-decoration: none;">Logout?</a></b>
						</p>
						<?php endif ?>
					</div>
      	</ul>
    	</div>
  	</div>
	</nav>

  <div class="grid-container">
		</br>
			<div class="item2" style="margin-top: 50px; margin-bottom: -40px;">
				<!-- Displays current date and time, updating every second
				<!--<p id="time" style="font-family: Cambria; color: #5d6470;"></p>-->
				<img src="../images/circuit_board_logo.png" alt="logo" id="logo" />
				<h1 id="heading-one"><i><strong>The-Tech-Store</strong><span style="font-size: 24px;">.co.uk</span></i></h1>
        <div class="divSubMenu">
  				<ul>
  					<a href=""><li class="sub-menu-item">Special Bargins!</medium></li></a>
  					<a href=""><li class="sub-menu-item">Christmas Sale</medium></li></a>
  					<a href=""><li class="sub-menu-item">Other</medium></li></a>
  				</ul>
        </div>
			</div>
		</div>
  </body>
</html>
