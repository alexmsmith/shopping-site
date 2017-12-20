<html>
	<head>
		<title>Online Store - Contact</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css.css">
		<style>
			@media screen and (max-width: 480px) {
				body {
					background-color: lightgreen;
					margin:0 auto;
				}
				div.canvas {
					background-color: white;
					border-radius: 3px;
					border: 2px solid green;
					margin:0 auto;
					margin-top: 10px;
					width: 444px;
					height: 1000px;
					/*position: absolute;
					left: 300px;
					/*outline: 2px solid red;*/
				}
				div.textRight {
					margin-left: 0px;
					width: 438px;
				}
				h1 {
					font-size:42px;
					font-family:Calisto MT;
					color: #333;
					border-bottom:1px solid #333;
					border-radius:4px;
					padding:6px;
					padding-left:58px;
					/*position:sticky;*/
					width:300px;
					margin:0 auto;
					margin-bottom:10px;
				}
			}

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
					<li><a class="active" href="contact.php">Contact</a></li>
					<a href="basket.php"><img id="shop_cart" src="../cart.png" alt="shopping_cart"></a>
					<li style="float:right"><a href="login.php">Log-in/Sign-up</a></li>
					<li style="float:right"><a href="calculate.php">Calculator</a></li>
				</ul>
			</div>
			<div class="item3">
				<p class="ex1"><!--<img src="../face.jpg" alt="smiley_face">-->This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThisThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
				This is a paragraphThis is a paragraphThis is a paragraphThis is a paragraphThis is a paragraph
			</p>
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
