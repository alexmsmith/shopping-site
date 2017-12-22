<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Techno Solutions - Basket</title>
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
				.container {
					border-radius: 4px;
					margin: auto;
					width: 1400px;
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
		<div class="grid-container">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="shopping.php">Shopping</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
				<li style="float:right"><a href="login.php">Log-in/Sign-up</a></li>
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
          <div class="container" style="width:700px;">
               <h3>Order Details</h3>
               <div class="table-responsive">
                    <table class="table table-bordered">
                         <tr>
                              <th width="40%">Item Name</th>
                              <th width="10%">Quantity</th>
                              <th width="20%">Price</th>
                              <th width="15%">Total</th>
                              <th width="5%">Action</th>
                         </tr>
                         <?php
                         if(!empty($_SESSION["shopping_cart"]))
                         {
                              $total = 0;
                              foreach($_SESSION["shopping_cart"] as $keys => $values)
                              {
                         ?>
                         <tr>
                              <td><?php echo $values["item_name"]; ?></td>
                              <td><?php echo $values["item_quantity"]; ?></td>
                              <td>£ <?php echo $values["item_price"]; ?></td>
                              <td>£ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                              <td><a href="shopping.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                         </tr>
                         <?php
                                   $total = $total + ($values["item_quantity"] * $values["item_price"]);
                              }
                         ?>
                         <tr>
                              <td colspan="3" align="right">Total</td>
                              <td align="right">£ <?php echo number_format($total, 2); ?></td>
                              <td></td>
                         </tr>
                         <?php
                         }
                         ?>
                    </table>
               </div>
          </div>
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
		header('location: home.php');
}
?>
