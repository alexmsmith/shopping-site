<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Store - Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css.css" />
		<style>
			<!-- Grid Layout -->
			.item1 { grid-area: header; background-color: #d5deef; border-radius: 2px; }
			.item2 { grid-area: menu; background-color: #d5deef; border-radius: 2px; }
			.item3 { grid-area: main; background-color: #d5deef; border-radius: 2px; }
			.item4 { grid-area: footer; background-color: #d5deef; border-radius: 2px; }

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
		</style>
	</head>
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
	<body>
		<div class="grid-container">
			<div class="item1"></div>
			<div class="item2">
				<h1><img src="../logo.png" alt="logo" id="logo"><i>Shopping Website</i></h1>

				<div id="welcome">
					<!-- Logged in user information -->
					<?php if (isset($_SESSION['username'])) : ?>
							<p style="float:right">
								Welcome <strong><?php echo $_SESSION['username']; ?></strong>
								<a href="home.php?logout='1'" style="color: red;">Logout</a>
							</p>
					<?php endif ?>
					<p id="time"></p>
				</div>

				<ul>
					<li><a class="active" href="home.php">Home</a></li>
					<li><a href="shopping.php">Shopping</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
					<li style="float:right"><a href="login.php">Log-in/Sign-up</a></li>
					<li style="float:right"><a href="calculate.php">Calculator</a></li>
				</ul>
			</div>

			<div class="item3">
				<!-- Notification message -->
				<?php if (isset($_SESSION['success'])) : ?>
					<h3>
						<?php
							echo $_SESSION['success'];
							// The unset() function destroys a given variable
							unset($_SESSION['success']);
						?>
					</h3>
				<?php endif ?>
			</div>
			<div class="item4">
						Footer
			</div>
			</div>
		</div>
	</body>
</html>
