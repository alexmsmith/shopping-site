<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Store - Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css.css" />
		<style>
			<!-- Grid Layout -->
			.item1 { grid-area: header; background-color: #d5deef; }
			.item2 { grid-area: menu; background-color: #d5deef; }
			.item3 { grid-area: main; background-color: #d5deef; border-radius: 2px; }
			.item4 { grid-area: right; background-color: #d5deef; border-radius: 2px; }
			.item5 { grid-area: footer; background-color: #d5deef; border-radius: 2px; }

			.grid-container {
				display: grid;
				grid:
					'header header header header header header'
					'menu menu menu menu menu menu'
					'main main main main right right'
					'footer footer footer footer footer footer';
				grid-gap: 10px;
				/*background-color: #2196F3;*/
				padding: 0px;
			}
			.grid-container>div {
				/*background-color: rgba(255, 255, 255, 0.8);*/
				text-align: center;
				font-size: 30px;
			}
			#time {
				font-size: 16px;
				text-align: left;
				padding: 2px;
				margin: 0;
			}
		</style>
	</head>
	<body>
		<div class="grid-container">
			<div class="item1"></div>
			<div class="item2">
				<h1><img src="../logo.png" alt="logo" id="logo"><i>Shopping Website</i></h1>
				<p id="time"></p>
				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="shopping.php">Shopping</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
					<li style="float:right"><a class="active" href="register.php">Log-in/Sign-up</a></li>
					<li style="float:right"><a href="calculate.php">Calculator</a></li>
				</ul>
			</div>
			<div class="item3">
				<form method="post" action="login.php">
					<!--  display validatopm errors here -->
					<?php include('errors.php'); ?>
					<fieldset>
						<legend>Login</legend><br/>
							<label>Username</label><br/>
							<input type="text" name="username"/><br/><br/>
							<label>Password</label><br/>
							<input type="password" name="password"/><br/><br/>
							<button type="submit" name="login">Login</button>
							<p>Not a member? <a href="register.php">Sign up</p>
					</fieldset>
				</form>
			</div>
			<div class="item4"></div>
			<div class="item5"></div>
		</div>
	</body>
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

		function printTime() {
			//Grabs current date/time
			var now = new Date();

			var day = now.getDate();
			var month = now.getMonth();
			var year = now.getFullYear();
			var hours = now.getHours();
			var minutes = now.getMinutes();
			var seconds = now.getSeconds();
			//Format data
			document.getElementById("time").innerHTML = day + "/" + month + "/" + year + " - " +
														hours + ":" + minutes + ":" + seconds + " " + ampm();
		}
		setInterval("printTime()");
		setInterval("printTime()", 1000);
	</script>
</html>
