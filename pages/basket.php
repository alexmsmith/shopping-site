<?php
session_start();
// Connect to the basket of the logged user
// Get id of user, then use this to associate with a basket?
if(isset($_SESSION['current_basket'])) {
	$current_basket = unserialize($_SESSION['current_basket']);
}else {
	$current_basket = array();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The-Tech-Store/Basket</title>
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
				#tableHeader {
					border-bottom: 1px solid black;
					text-align: center;
				}
				#container {
					border-radius: 4px;
					margin: auto;
					background-color: rgba(213,222,239,0.6);
					width: 700px;
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
					#tableHeader {
						border-bottom: 1px solid black;
						text-align: left;
					}
					#tableData {
						text-align: left;
						font-size: 12px;
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
					<li id="menuItem"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login / Register</a></li>
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
				<h1 id="heading-one"><i><strong>The-Tech-Store</strong><span style="font-size: 24px;">.co.uk</span></i></h1>
			</div>
			<div class="item3">
          <div id="container">
               <h3>Order Details</h3>
               <div class="table-responsive">
                    <table class="table table-bordered">
                         <tr>
                              <th id="tableHeader" width="40%">Item Name</th>
                              <th id="tableHeader" width="10%">Quantity</th>
                              <th id="tableHeader" width="20%">Price</th>
                              <th id="tableHeader" width="15%">Total</th>
                              <th id="tableHeader" width="5%">Action</th>
                         </tr>
                         <?php
                         if(!empty($_SESSION["shopping_cart"]))
                         {
                              $total = 0;
                              foreach($_SESSION["shopping_cart"] as $keys => $values)
                              {
                         ?>
                         <tr>
                              <td id="tableData"><?php echo $values["item_name"]; ?></td>
                              <td id="tableData"><?php echo $values["item_quantity"]; ?></td>
                              <td id="tableData">£ <?php echo $values["item_price"]; ?></td>
                              <td id="tableData">£ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                              <td id="tableData"><a href="shopping.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                         </tr>
                         <?php
                                   $total = $total + ($values["item_quantity"] * $values["item_price"]);
                              }
                         ?>
                         <tr>
                              <td colspan="3" align="right" style="background-color: #4CAF50; color: white;">Total</td>
                              <td align="center" style="background-color: #4CAF50; color: white;">£ <?php echo number_format($total, 2); ?></td>
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
			</div>
		</div>
	</body>
</html>
