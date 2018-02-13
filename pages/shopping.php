<?php
// Include a session initialisation for the user
include_once 'includes/session.php';
// Connect to both the shopping and registration databases
$connect = mysqli_connect('localhost', 'root', '', 'shopping');
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
if(isset($_SESSION['cart'])) {
	if(isset($_POST['add_to_cart'])) {
		// If item hasn't been added to array
		if(!in_array($_GET['id'], $_SESSION['cart'])) {
			$count = count($_SESSION['cart']);
			// Check for duplicates in session variable['cart']
			// If array is empty, push value to array
			for($i=0; $i<count($_SESSION['cart']); ) {
				$value = $_SESSION['cart'][$i];
				if($_GET['id'] == $value)
					// If duplicate is found then break
					break;
				else {
					// Otherwise push id to the cart
					$i++;
					if($i >= count($_SESSION['cart']))
						array_push($_SESSION['cart'], $_GET['id']);
				}
			}
			// Convert to string
			$basket = implode("",$_SESSION['cart']);
			$basketQuery = "UPDATE users SET item_ids='$basket' WHERE username='$username'";
			$result = mysqli_query($connectReg, $basketQuery);
			// If the item has been already added to the cart
	}	else {
			echo '<script>alert("Item Already Added")</script>';
			echo '<script>window.location="shopping.php"</script>';
		}
	}
}
// Remove a single item from basket and update database
if(isset($_GET['action'])) {
	if($_GET['action'] == 'delete') {
		foreach($_SESSION['cart'] as $key => $value) {
			if($value == $_GET['id']) {
				unset($_SESSION['cart'][$key]);
				// Now time to update the database with new array
				// First, turn array into a string
				$basket = implode("",$_SESSION['cart']);
				$basketQuery = "UPDATE users SET item_ids='$basket' WHERE username='$username'";
				$result = mysqli_query($connectReg, $basketQuery);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="basket.php"</script>';
			}
		}
	}
}
// Remove all items from basket and update database
if(isset($_GET['removeAll'])) {
	if($_GET['removeAll'] == 'delete') {
		unset($_SESSION['cart']);
		// Now time to update the database with new array
		// First, turn array into a string
		$quer3 = "UPDATE users SET item_ids='' WHERE username='$username'";
		$result2 = mysqli_query($connectReg, $quer3);
		echo '<script>alert("Items Removed")</script>';
		echo '<script>window.location="basket.php"</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The-Tech-Store/Store</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css.css">
		<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Used for the internal data and time -->
		<script src="time.js"></script>
		<style>
			/* Place Grid Layout in external style sheet */
			<!-- Grid Layout -->
			.item1 { grid-area: header; background-color: #d5deef; border-radius: 2px; }
			.item2 { grid-area: menu; margin-top: 24px; }
			.item3 { grid-area: main; }
			.item4 { grid-area: footer; }
			.grid-container {
				display: grid;
				grid:
					'header header header header header header'
					'menu menu menu menu menu menu'
					'main main main main main main'
					'footer footer footer footer footer footer';
					grid-gap: 10px;
					margin-top: -10px;
					text-align: center;
				}
				#col-md-4 {
					margin-left: 50px;
					width: 600px;
					height: 300px;
					float: left;
				}
				#store {
					padding: 6px;
				}
				#img {
					border-radius: 25px;
					padding-right: 10px;
				}
				#imgContent {
					padding: 10px;
				}
				#btn-success {
					transition-duration: 0.4s;
					border-radius: 7px;
					background-color: #c0cce2;
					color: black;
					padding: 6px;
					font-family: Cambria;
					font-size: 13px;
				}
				#btn-success:hover {
					background-color: #4CAF50;
					color: white;
				}
				#form-control {
					width: 40px;
					height: 25px;
					text-align: center;
				}
				#text-info {
					border-bottom-left-radius: 6px;
					border-bottom-right-radius: 6px;
					border-bottom: 2px solid rgba(76,96,127,0.6);
					padding: 10px;
					font-family: Agency FB;
					font-size: 18px;
				}
				/* Media query (Iphone 7 & 8 Plus)*/
				@media screen and (max-width: 414px){
					#container {
						border-radius: 4px;
		        margin: auto;
		        background-color: rgba(213,222,239,0.6); border-radius: 4px;
		        width: 414px;
						height: 2400px;
					}
					#col-md-4 {
						margin-left: 0px;
						width: 414px;
						float: none;
					}
					#store {
						padding: 6px;
						text-align: center;
						width: 414px;
						margin-left: -16px;
					}
					#imgContent {
	          padding: 10px;
	        }
					#text-info {
						border-bottom-left-radius: 6px;
						border-bottom-right-radius: 6px;
						border-bottom: 2px solid rgba(247,232,121,0.6);
						padding: 10px;
						font-family: Agency FB;
						font-size: 16px;
	        }
					#heading-three {
	          font-size: 22px;
	        }
					#heading-one {
						font-size: 22px;
						width: 400px;
						margin-top: 48px;
					}
					.item2 {
						grid-area: menu;
						margin-top: 50px;
					}
					#search {
		        display: none;
		      }
					#logo {
						margin-top: 2px;
						margin-right: 5px;
		      	width: 58px;
		      	height: 58px;
		      	z-index: -1;
		      }
					#listHome a {
						margin-left: 0px;
					}
					#shop_cart {
						width: 38px;
						height: 33px;
						margin-top: 9px;
						margin-left: 16px;
						margin-bottom: 5px;
					}
					#welcome {
						margin-top: 15px;
						margin-right: 15px;
						margin-left: 5px;
					}
					#welcome p {
						font-size: 16px;
						font-family: Cambria;
						color: #5d6470;
					}
				}
		</style>
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
        	<li class="active" style="font-size: 13px;"><a href="shopping.php">Shopping <span class="glyphicon glyphicon-gift"></span></a></li>
        	<li id="menuItem" style="font-size: 13px;"><a href="about.php">About</a></li>
					<li id="menuItem" style="font-size: 13px; "><a href="contact.php">Contact <span class="glyphicon glyphicon-envelope"></span></a></li>
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
						<p>
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
			<div class="item2" style="margin-top: 50px;">
				<!-- Displays current date and time, updating every second
				<!--<p id="time" style="font-family: Cambria; color: #5d6470;"></p>-->
				<img src="../images/circuit_board_logo.png" alt="logo" id="logo" />
				<h1 id="heading-one"><i><strong>The-Tech-Store</strong><span style="font-size: 24px;">.co.uk</span></i></h1>
				<ul class="sub-menu">
					<a href=""><li class="sub-menu-item">Special Bargins!</medium></li></a>
					<a href=""><li class="sub-menu-item">Christmas Sale</medium></li></a>
					<a href=""><li class="sub-menu-item">Other</medium></li></a>
				</ul>
			</div>
			<div class="item3">
						<?php
						 $query = "SELECT * FROM tbl_product ORDER BY id ASC";
						 $result = mysqli_query($connect, $query);
						 if(mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_array($result)) {
						 ?>
							<form method="post" action="shopping.php?action=add&id=<?php echo $row["id"]; ?>">
								<div id="col-md-4" style="padding:16px;">
									<table id="store">
										<tr>
											<td id="img">
												<!-- Display product images -->
												<img class="img-responsive" src="<?php echo $row["img"]; ?>"/>
											</td>
											<td id="imgContent">
												<span style="float: right;" class="label label-success">New!</span>
												<h3 id="heading-three"><?php echo $row["name"]; ?></h3>
												<medium class="text-muted">
													<?php echo $row["description"]; ?></br></br>
													<b>Price:</b> £<?php echo $row["price"]; ?></br></br>
													<!-- If user has logged in, then enable 'add to cart' buttons -->
													<?php if (isset($_SESSION['username'])) : ?>
														<input type="submit" class="btn btn-primary active" name="add_to_cart" id="btn-sucess" value="Add to Basket" />
													<?php endif ?>
												</medium>
												<p id="text-info"></p>
											</td>
										</tr>
									</table>
									<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
									<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
								</div>
							</form>
						 <?php
									}
						 }
						 ?>
						 <div style="clear:both"></div>
						 <br />
				<br />
			</div>
			<div class="item4" style="background-color: rgba(121, 167, 247, 0.4);">
				<!-- Bootstrap pagination -->
					<span class="pagination">
						<li><a href="">Previous</a></li>
						<li><a href="#">1</a></li>
						<li class="disabled"><a href="">2</a></li>
						<li class="disabled"><a href="">3</a></li>
						<li class="disabled"><a href="">4</a></li>
						<li class="disabled"><a href="">5</a></li>
						<li><a href="">Next</a></li>
						</span>
			</div>
		</div>
	</body>
</html>
