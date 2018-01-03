<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The-Tech-Store/Register</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css.css">
		<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			.error {
				width: 92%;
				margin: 0px auto;
				padding: 10px;
				border: 1px soild #a94442;
				color: #a94442;
				background: #f2dede;
				border-radius: 5px;
				text-align: left;
			}
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
				#container {
					border-radius: 4px;
					margin: auto;
					background-color: rgba(213,222,239,0.6);
					/*width: 1730px;*/
					height: 1200px;
					padding-top: 20px;
				}
				#regForm {
					width: 16%;
					text-align: center;
					padding-top: 20px;
					padding-bottom: 5px;
					border-radius: 6px;
					border: 3px solid rgba(73, 86, 107, 0.2);
					margin-left: 60px;
				}
				/* Media query (Iphone 7 & 8 Plus)*/
				@media screen and (max-width: 414px){
					#container {
						border-radius: 4px;
		        margin: auto;
		        background-color: rgba(213,222,239,0.6); border-radius: 4px;
		        width: 414px;
					}
					#regForm {
						width: 72%;
						text-align: center;
						padding-top: 20px;
						padding-bottom: 5px;
						border-radius: 6px;
						border: 3px solid rgba(73, 86, 107, 0.2);
						margin-left: 60px;
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
        	<li id="listHome"><a href="home.php">Home</a></li>
        	<li id="menuItem"><a href="shopping.php">Shopping</a></li>
        	<li id="menuItem"><a href="about.php">About</a></li>
					<li id="menuItem"><a href="contact.php">Contact</a></li>
      	</ul>
      	<ul class="nav navbar-nav navbar-right">
					<li id="menuItem"><a href="calculate.php">Calculator</a></li>
					<li id="menuItem" class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login / Register</a></li>
					<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
					<div id="welcome" style="float: right;">
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
	</div>
	<div class="item3">
		<div id="container">
			<form method="post" action="register.php" id="regForm">
				<!--  display validatopm errors here -->
				<?php include('errors.php'); ?>
				<fieldset>
					<legend>Register</legend>
					<label>Username</label><br/>
					<input type="text" name="username" style="border-radius: 4px;" value="<?php echo $username; ?>"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
					<label>Email</label><br/>
					<input type="text" name="email" style="border-radius: 4px;" value="<?php echo $email; ?>"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
					<label>Password</label><br/>
					<input type="password" name="password" style="border-radius: 4px;"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
					<label>Confirm Password</label><br/>
					<input type="password" name="confirmPassword" style="border-radius: 4px;"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
					<button type="submit" name="register" style="border-radius: 4px;"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>>Register</button></br></br>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="item4">
		Footer
	</div>
	</body>
</html>
<!--
*What to add:
	- If entered email is already associated with an account, then prevent register of email.
-->
<?php
	if(isset($_SESSION['username'])) { ?>
		<script>alert("You've already logged in.");</script>
	<?php }
?>
