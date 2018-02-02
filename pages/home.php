<?php
include_once 'includes/session.php';
// Logout
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: home.php');
}
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
		<title>The-Tech-Store/Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css.css">
		<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			/* Place Grid Layout in external style sheet */
			<!-- Grid Layout -->
			.item1 { grid-area: header; background-color: #d5deef; border-radius: 2px; }
			.item2 { grid-area: menu; margin-top: 24px; }
			.item3 { grid-area: main; }
			.item4 { grid-area: footer; background-color: rgba(213,222,239,0.6); border-radius: 4px; }

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
				/* Media query (Iphone 7 & 8 Plus)*/
				@media screen and (max-width: 414px){
					#container {
						border-radius: 4px;
		        margin: auto;
		        background-color: rgba(213,222,239,0.6); border-radius: 4px;
		        width: 414px;
					}
					#heading-three {
	          font-size: 22px;
	        }
					#heading-one {
						font-size: 22px;
						width: 400px;
						margin-top: 48px;
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
					#search {
		        display: none;
		      }
				}
		</style>
		<!-- Add date/time script to external JS script -->
		<script type="text/javascript">
		//Basic clock
			function ampm() {
				var now = new Date();
				var hours = now.getHours();

				if(hours > 12) {
					return "pm";
				}else {
					return "am";
				}
			}
			// If hours, minutes or seconds hits 0, change to 00
			function secondsZero() {
				var now = new Date();
				var seconds = now.getSeconds();
				if(seconds < 10){
					return '0'+seconds;
				}else {
					return seconds;
				}
			}
			function hoursZero() {
				var now = new Date();
				var hours = now.getHours();
				if(hours < 10){
					return '0'+hours;
				}else {
					return hours;
				}
			}
			function minutesZero() {
				var now = new Date();
				var minutes = now.getMinutes();
				if(minutes < 10){
					return '0'+minutes;
				}else {
					return minutes;
				}
			}
			function days() {
				var now = new Date();
				var day = now.getDate();
				if(day < 10) {
					return '0'+day;
				}else {
					return day;
				}
			}
			function months() {
				var now = new Date();
				var month = now.getMonth();
				if(month < 10) {
					return '0'+(month+1);
				}else {
					return month;
				}
			}
			function printTime() {
				//Grabs current date/time
				var now = new Date();
				var day = now.getDate();
				var month = now.getMonth();
				var year = now.getFullYear();
				//Format data
				document.getElementById("time").innerHTML = days() + "/" + months() + "/" + year + " - " +
															hoursZero() + ":" + minutesZero() + ":" + secondsZero() + " " + ampm();
			}
			setInterval("printTime()");
			setInterval("printTime()", 1000);
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
        	<li id="menuItem" style="font-size: 13px;"><a href="about.php">About</a></li>
					<li id="menuItem" style="font-size: 13px; "><a href="contact.php">Contact <span class="glyphicon glyphicon-envelope"></span></a></li>
      	</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="menuItem" style="font-size: 13px;"><a href="calculate.php">Calculator</a></li>
					<li id="menuItem" style="font-size: 13px;"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login / Register</a></li>
					<a href="basket.php"><span class="glyphicon glyphicon-shopping-cart" style="font-size: 28px; margin-top: 10px; margin-left: 5px;"></span></a>
					<!--<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>-->
					<div class="basket_counter">
						<?php
							// Convert to string
							if(isset($_SESSION['username'])) {
								$b = implode("",$_SESSION['cart']);
								$_SESSION['counter'] = $b;
								//echo strlen($_SESSION['counter']);
								?><span class="label" style="padding:2px; margin-left: -12px; font-size: 16px;"><?php echo strlen($_SESSION['counter']); ?></span>
								<?php
							}
						?>
					</div>
					<div id="welcome" style="float: right; margin-left: 16px;">
						<!-- Logged in user information -->
						<?php if (isset($_SESSION['username'])) : ?>
								<p>
									Welcome <strong><?php echo $_SESSION['username']; ?>!</strong>
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
				<p id="time" style="font-family: Cambria; color: #5d6470;"></p>
				<img src="../images/circuit_board_logo.png" alt="logo" id="logo">
				<h1 id="heading-one"><i><strong>The-Tech-Store</strong><span style="font-size: 24px;">.co.uk</span></i>
					<form style="float: right;">
						<input id="search" type="text" name="search" placeholder="Search.."/>
					</form>
				</h1>
			</div>

			<div class="item3">
					<!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
  				<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin: auto; margin-top: 20px; width: 60%;">
    				<!-- Indicators -->
    				<ol class="carousel-indicators">
      				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      				<li data-target="#myCarousel" data-slide-to="1"></li>
      				<li data-target="#myCarousel" data-slide-to="2"></li>
    				</ol>
						<!-- Wrapper for slides -->
    				<div class="carousel-inner" style="z-index: -1; border-radius: 6px; border: solid black 1px;">
      				<div class="item active">
        				<img src="../images/Carousel/switch.jpg" class="img-rounded" alt="nintendo_switch" style="width: 100%; margin: auto;">
      				</div>

      				<div class="item">
        				<img src="../images/Carousel/ps4.jpg" class="img-rounded" alt="ps4" style="width:100%; margin: auto; z-index: -1;">
      				</div>

      				<div class="item">
        				<img src="../images/Carousel/xbox.jpg" class="img-rounded" alt="xbox" style="width:100%; margin: auto; z-index: -1;">
      				</div>
    				</div>
						<!-- Left and right controls -->
    				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      				<span class="glyphicon glyphicon-chevron-left"></span>
      				<span class="sr-only">Previous</span>
    				</a>
    				<a class="right carousel-control" href="#myCarousel" data-slide="next">
      				<span class="glyphicon glyphicon-chevron-right"></span>
      				<span class="sr-only">Next</span>
    				</a>
  				</div>
        <br />
				<div id="container" style="padding-top: 20px;">
					<p></p>
				</div>
			</div>
			<div class="item4">
				Footer
			</div>
		</div>
	</body>
</html>
