<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The-Tech-Store - Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			<!-- Grid Layout -->
			.item1 { grid-area: header; background-color: #d5deef; border-radius: 2px; }
			.item2 { grid-area: menu; margin-top: 24px; }
			.item3 { grid-area: main; background-color: rgba(213,222,239,0.6); border-radius: 4px; }
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
				#text-info {
					font-family: Agency FB;
					font-size: 18px;
				}
				h3 {
					font-family: Agency FB;
				}
		</style>
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
			function printTime() {
				//Grabs current date/time
				var now = new Date();
				var day = now.getDate();
				var month = now.getMonth();
				var year = now.getFullYear();
				//Format data
				document.getElementById("time").innerHTML = day + "/" + month + "/" + year + " - " +
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
        	<li id="listHome"><a href="home.php">Home</a></li>
        	<li class="active"><a href="shopping.php">Shopping</a></li>
        	<li id="menuItem"><a href="about.php">About</a></li>
					<li id="menuItem"><a href="contact.php">Contact</a></li>
      	</ul>
      	<ul class="nav navbar-nav navbar-right">
					<li id="menuItem"><a href="calculate.php">Calculator</a></li>
					<li id="menuItem"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login / Register</a></li>
					<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
      	</ul>
    	</div>
  	</div>
	</nav>
		<div class="grid-container">
			</br>
			<div class="item2">
				<p id="time" style="font-family: Cambria;"></p>
				<h1><img src="../images/circuit_board_logo.png" alt="logo" id="logo"><i>The-Tech-Store<span style="font-size: 24px;">.co.uk</span></i></h1>
				<div id="welcome" style="float :right;">
					<!-- Logged in user information -->
					<?php if (isset($_SESSION['username'])) : ?>
							<p style="font-size: 18px; font-family: Cambria;">
								Welcome <strong><?php echo $_SESSION['username']; ?>!</strong>
								<b><a href="logout.php?logout='1'" style="color: red; text-decoration: none;">Logout?</a></b>
							</p>
					<?php endif ?>
				</div>

			</div>
			<div class="item3">
				<br />


        <br />
			</div>
			<div class="item4">
				Footer
			</div>
		</div>
	</body>
</html>
<?php
// Logout
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: logout.php');
}
?>
