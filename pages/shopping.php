<html>
	<head>
		<title>Online Store - Shopping</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css.css">
		<style>
			<!-- Grid Layout -->
			.item1 { grid-area: header; background-color: lightgreen; }
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
				grid-gap: 8px;
				margin: auto;
				
				/*background-color: #2196F3;*/
			}
			#time {
				font-size: 16px;
				text-align: left;
				padding: 2px;
				margin: 0;
			}
			
			#shop_table {
				margin:auto;
				margin-top:20px;
				margin-bottom:20px;
			}
			#item {
				border-radius: 4px;
				padding: 4px;
				background-color: #f2f3f4;
			}
			#item_image {
				width: 276px;
				height: 276px;
			}
			#descrip_entry {
				width: 276px;
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
					<li><a class="active" href="shopping.php">Shopping</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
					<li style="float:right"><a href="login.php">Log-in/Sign-up</a></li>
					<li style="float:right"><a href="calculate.php">Calculator</a></li>
				</ul>
			</div>
			<div class="item3">
				<table id="shop_table">
				<tr>
					<td id="item"><img id="item_image" src="../images/item_1.jpg" alt="item_1">
						<p style="text-align:center" id="descrip_entry">This is a collection of games belonging to the SEGA Mega Drive.<br /><br /><b>£25.99</b>
							<br /><br /><button type="button" value="sega">Add to basket</button>
						</p>
					</td>
					<td id="item"><img id="item_image" src="../images/item_2.jpg" alt="item_2">
						<p style="text-align:center" id="descrip_entry">Harvest Moon is a rare game and must be purchased by your very good self.<br /><br /><b>£14.99</b>
							<br /><br /><button type="button" value="harvest moon">Add to basket</button>
						</p>
					</td>
					<td id="item"><img id="item_image" src="../images/item_3.jpg" alt="item_3">
						<p style="text-align:center" id="descrip_entry">Crash Bandicoot 2 for the PS1 is an amazing game, get it now!<br /><br /><b>£9.99</b>
							<br /><br /><button type="button" value="crash">Add to basket</button>
						</p>
					</td>
					<td id="item"><img id="item_image" src="../images/item_4.jpg" alt="item_4">
						<p style="text-align:center" id="descrip_entry">Game case is the best case for gaming in a gaming environment.<br /><br /><b>£6.99</b>
							<br /><br /><button type="button" value="game case">Add to basket</button>
						</p>
					</td>
				</tr>
			</table>
			<table id="shop_table">
				<tr>
					<td id="item"><img id="item_image" src="../images/item_1.jpg" alt="item_1">
						<p style="text-align:center" id="descrip_entry">This is a collection of games belonging to the SEGA Mega Drive.<br /><br /><b>£25.99</b>
							<br /><br /><button type="button" value="sega">Add to basket</button>
						</p>
					</td>
					<td id="item"><img id="item_image" src="../images/item_2.jpg" alt="item_2">
						<p style="text-align:center" id="descrip_entry">Harvest Moon is a rare game and must be purchased by your very good self.<br /><br /><b>£14.99</b>
							<br /><br /><button type="button" value="harvest moon">Add to basket</button>
						</p>
					</td>
					<td id="item"><img id="item_image" src="../images/item_3.jpg" alt="item_3">
						<p style="text-align:center" id="descrip_entry">Crash Bandicoot 2 for the PS1 is an amazing game, get it now!<br /><br /><b>£9.99</b>
							<br /><br /><button type="button" value="crash">Add to basket</button>
						</p>
					</td>
					<td id="item"><img id="item_image" src="../images/item_4.jpg" alt="item_4">
						<p style="text-align:center" id="descrip_entry">Game case is the best case for gaming in a gaming environment.<br /><br /><b>£6.99</b>
							<br /><br /><button type="button" value="game case">Add to basket</button>
						</p>
					</td>
				</tr>
			</table>
			</div>
			<div class="item4"></div>
			<div class="item5">
				<p class="ex1"><!--<img src="face.jpg" alt="Smiley Face">-->This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
					This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
					This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
					This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
					This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				</p>
			</div>
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