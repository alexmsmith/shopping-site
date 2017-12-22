<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>The-Tech-Store - Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			<!-- Grid Layout -->
			.item1 { grid-area: header; background-color: #d5deef; border-radius: 2px; }
			.item2 { grid-area: menu; margin-top: 24px; }
			.item3 { grid-area: main; background-color: rgba(213,222,239,0.6); border-radius: 4px; width: 50%; margin:auto; }
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
				#logForm {
					width: 30%;
					margin-left: 6px;
					margin-bottom: 6px;
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
		<div class="grid-container">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="shopping.php">Shopping</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
				<li style="float:right"><a class="active" href="login.php">Log-in/Sign-up</a></li>
				<li style="float:right"><a href="calculate.php">Calculator</a></li>
			</ul>
		</br>
			<div class="item2">
				<p id="time" style="font-family: Cambria;"></p>
				<h1><img src="../images/circuit_board_logo.png" alt="logo" id="logo"><i>The-Tech-Store<span style="font-size: 24px;">.co.uk</span></i></h1>
				<div id="welcome" style="float :right;">
					<!-- Logged in user information -->
					<?php if (isset($_SESSION['username'])) : ?>
							<p style="font-size: 18px; font-family: Cambria;">
								Welcome <strong><?php echo $_SESSION['username']; ?>!</strong>
								<b><a href="home.php?logout='1'" style="color: red; text-decoration: none;">Logout?</a></b>
							</p>
					<?php endif ?>
				</div>

			</div>
			<div class="item3">
				<form method="post" action="login.php" id="logForm">
					<!--  display validatopm errors here -->
					<?php include('errors.php'); ?>
					<fieldset>
						<legend>Login</legend><br/>
						<label>Username</label><br/>
						<input type="text" name="username"/><br/><br/>
						<label>Password</label><br/>
						<input type="password" name="password"/><br/><br/>
						<button type="submit" name="login">Login</button>
						<p>Not a member? <a href="register.php">Sign up</a></p>
					</fieldset>
				</form>
				<div style="width: 65%; margin-left: 285px; margin-top: -236px;">
					<p id="text-info">
						<strong>Example Text:</strong> phpMyAdmin is a free software tool written in PHP,
						intended to handle the administration of MySQL over the Web. phpMyAdmin
						supports a wide range of operations on MySQL and MariaDB. Frequently used
						operations (managing databases, tables, columns, relations, indexes, users,
						permissions, etc) can be performed via the user interface, while you still
						have the ability to directly execute any SQL statement.
						phpMyAdmin is a free software tool written in PHP,
						intended to handle the administration of MySQL over the Web. phpMyAdmin
						supports a wide range of operations on MySQL and MariaDB. Frequently used
						operations (managing databases, tables, columns, relations, indexes, users,
						permissions, etc) can be performed via the user interface, while you still
						have the ability to directly execute any SQL statement.
						intended to handle the administration of MySQL over the Web. phpMyAdmin
						supports a wide range of operations on MySQL and MariaDB. Frequently used
						operations (managing databases, tables, columns, relations, indexes, users,
						permissions, etc) can be performed via the user interface, while you still
						have the ability to directly execute any SQL statement.
						intended to handle the administration of MySQL over the Web. phpMyAdmin
						supports a wide range of operations on MySQL and MariaDB. Frequently used
						operations (managing databases, tables, columns, relations, indexes, users,
						permissions, etc) can be performed via the user interface, while you still
						have the ability to directly execute any SQL statement.
						intended to handle the administration of MySQL over the Web. phpMyAdmin
						supports a wide range of operations on MySQL and MariaDB. Frequently used
						operations (managing databases, tables, columns, relations, indexes, users,
						permissions, etc) can be performed via the user interface, while you still
						have the ability to directly execute any SQL statement.
						intended to handle the administration of MySQL over the Web. phpMyAdmin
						supports a wide range of operations on MySQL and MariaDB. Frequently used
						operations (managing databases, tables, columns, relations, indexes, users,
						permissions, etc) can be performed via the user interface, while you still
						have the ability to directly execute any SQL statement.
						intended to handle the administration of MySQL over the Web. phpMyAdmin
						supports a wide range of operations on MySQL and MariaDB. Frequently used
						operations (managing databases, tables, columns, relations, indexes, users,
						permissions, etc) can be performed via the user interface, while you still
						have the ability to directly execute any SQL statement.
						intended to handle the administration of MySQL over the Web. phpMyAdmin
						supports a wide range of operations on MySQL and MariaDB. Frequently used
						operations (managing databases, tables, columns, relations, indexes, users,
						permissions, etc) can be performed via the user interface, while you still
						have the ability to directly execute any SQL statement.
					</p>
				</div>
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
		header('location: home.php');
}
?>
