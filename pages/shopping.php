<?php
session_start();


$connect = mysqli_connect('localhost', 'root', '', 'shopping');
if(isset($_POST['add_to_cart'])) {
	if(isset($_SESSION['shopping_cart'])) {
		$item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
		if(!in_array($_GET['id'], $item_array_id)) {
			$count = count($_SESSION['shopping_cart']);
			$item_array = array(
					'item_id'               =>     $_GET["id"],
          'item_name'               =>     $_POST["hidden_name"],
          'item_price'          =>     $_POST["hidden_price"],
          'item_quantity'          =>     $_POST["quantity"]
			);
			$_SESSION['shopping_cart'][$count] = $item_array;
		}
		else {
			echo '<script>alert("Item Already Added")</script>';
			echo '<script>window.location="shopping.php"</script>';
		}
	}
	else {
			$item_array = array(
      	'item_id'               =>     $_GET["id"],
        'item_name'               =>     $_POST["hidden_name"],
        'item_price'          =>     $_POST["hidden_price"],
        'item_quantity'          =>     $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][0] = $item_array;
	}
}
if(isset($_GET["action"]))
{
     if($_GET["action"] == "delete")
     {
          foreach($_SESSION["shopping_cart"] as $keys => $values)
          {
               if($values["item_id"] == $_GET["id"])
               {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="basket.php"</script>';
               }
          }
     }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The-Tech-Store - Store</title>
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
				.col-md-4 {
					width: 666px;
					float: left;
				}
				#store {
					border-radius: 4px;
					padding: 6px;
				}
				#img {
					padding-right: 10px;
				}
				#imgContent {
					/* background-color: #c0cce2; */
					border-bottom: 4px solid #c0cce2;
					border-radius: 6px;
					padding: 10px;
				}
				#text-info {
					font-family: Agency FB;
					font-size: 18px;
				}
				#btn-success {
					transition-duration: 0.4s;
					border-radius: 7px;
					background-color: #c0cce2;
					color: black;
					padding: 6px;
					font-family: Cambria;
				}
				#btn-success:hover {
					background-color: #4CAF50;
					color: white;
				}
				h3 {
					font-family: Agency FB;
				}
				#search {
					float: right;
					width: 160%;
					box-sizing: border-box;
					border: 2px solid #ccc;
					border-radius: 6px;
					font-size: 14px;
					background-color: white;
					background-image: url('../images/search.png');
					background-position: 9px 6px;
					background-repeat: no-repeat;
					opacity: 0.6;
					padding: 8px 16px 8px 36px;
					margin-left: 15px;
					margin-top: 8px;
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
				<li><a class="active" href="shopping.php">Shopping</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
				<li style="float:right"><a href="login.php">Log-in/Sign-up</a></li>
				<li style="float:right"><a href="calculate.php">Calculator</a></li>
			</ul>
		</br>
			<div class="item2">
				<p id="time" style="font-family: Cambria;"></p>
				<h1><img src="../images/circuit_board_logo.png" alt="logo" id="logo"><i>The-Tech-Store<span style="font-size: 24px;">.co.uk</span></i>
					<form style="float: right;">
						<input id="search" type="text" name="search" placeholder="Search.."/>
					</form>
				</h1>

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

          <div class="container">

               <!-- <h3 align="center">Simple PHP Mysql Shopping Cart</h3><br /> -->
               <?php

               $query = "SELECT * FROM tbl_product ORDER BY id ASC";
               $result = mysqli_query($connect, $query);
               if(mysqli_num_rows($result) > 0)
               {
                    while($row = mysqli_fetch_array($result))
                    {
               ?>
               <form method="post" action="shopping.php?action=add&id=<?php echo $row["id"]; ?>">
							 		<div class="col-md-4" style="padding:16px;">
                    	<table id="store">
													<tr>
															<td id="img">
																<!-- Display product images -->
																<img src="<?php echo $row["img"]; ?>" id="product_image" />
															</td>
															<td id="imgContent">
																<h3><?php echo $row["name"]; ?></h3>
																<p id="text-info">
																	<?php echo $row["description"]; ?></br></br>
																	<b>Price:</b> £<?php echo $row["price"]; ?></br></br>
																	Quantity: <input type="text" name="quantity" class="form-control" value="1" /></br></br>
																	<input type="submit" name="add_to_cart" id="btn-success" value="Add to Cart" />
																</p>
															</td>
													</tr>
											</table>
												<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
												<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                  </div>
               </form>
               <?php
                    }
               }
               ?>
               <div style="clear:both"></div>
               <br />
          </div>
          <br />
			</div>
			<div class="item4">
				Footer
			</div>
		</div>
	</body>
</html>
