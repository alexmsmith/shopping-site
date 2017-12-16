<?php include('server.php'); ?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Online Store - Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css.css" />
		<style>
			<!-- Grid Layout -->
			.item1 { grid-area: header; background-color: lightgreen; }
			.item2 { grid-area: menu; background-color: lightgreen; }
			.item3 { grid-area: main; background-color: lightgreen; border-radius: 2px; }
			.item4 { grid-area: right; background-color: lightgreen; border-radius: 2px; }
			.item5 { grid-area: footer; background-color: lightgreen; border-radius: 2px; }
			
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
				
				<!-- Logged in user information -->
				<?php if (isset($_SESSION['username'])) : ?>
					<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
					<p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
				<?php endif ?>
				
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