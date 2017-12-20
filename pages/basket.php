<?php
session_start();
//$var_value = $_SESSION['shopping_cart'];
?>
<html>
	<head>
		<title>Online Store - Basket</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
					<li style="float:right"><a href="login.php">Log-in/Sign-up</a></li>
					<li style="float:right"><a href="calculate.php">Calculator</a></li>
				</ul>
			</div>
			<div class="item3">
				<br />
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
                              <td>$ <?php echo $values["item_price"]; ?></td>
                              <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                              <td><a href="shopping.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                         </tr>
                         <?php
                                   $total = $total + ($values["item_quantity"] * $values["item_price"]);
                              }
                         ?>
                         <tr>
                              <td colspan="3" align="right">Total</td>
                              <td align="right">$ <?php echo number_format($total, 2); ?></td>
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
