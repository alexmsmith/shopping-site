<!--
Calculator script still incomplete
-->
<?php
include_once 'includes/session.php';
include_once 'includes/template.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The-Tech-Store/Calculator</title>
		<!-- Calculator script -->
		<script src="CalculatorScript.js"></script>
		<style>
			/* Place Grid Layout in external style sheet */
			<!-- Grid Layout -->
			.item1 { grid-area: header; }
			.item2 { grid-area: menu; }
			.item3 { grid-area: main; }
			.item4 { grid-area: footer; padding-top: 5px; }

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
					#search {
		        display: none;
		      }
				}
		</style>
	</head>
	<body>
	<div class="grid-container">
		</br>
			<div class="item3">
          <div id="container">
						<input type="text" id="result"><br /><br />
			<div>
				<table id="myTable">
					<tr>
						<td><button id="zero" value="0" onclick="changeText(this.id)">0</button></td>
						<td><button id="one" value="1" onclick="changeText(this.id)">1</button></td>
						<td><button id="two" value="2" onclick="changeText(this.id)">2</button></td>
						<td><button id="plus" value="+" onclick="calculate(this.id)">+</button></td>
					</tr>
					<tr>
						<td><button id="three" value="3" onclick="changeText(this.id)">3</button></td>
						<td><button id="four" value="4" onclick="changeText(this.id)">4</button></td>
						<td><button id="five" value="5" onclick="changeText(this.id)">5</button></td>
						<td><button id="minus" value="-" onclick="calculate(this.id)">-</button></td>
					</tr>
					<tr>
						<td><button id="six" value="6" onclick="changeText(this.id)">6</button></td>
						<td><button id="seven" value="7" onclick="changeText(this.id)">7</button></td>
						<td><button id="eight" value="8" onclick="changeText(this.id)">8</button></td>
						<td><button id="times" value="*" onclick="calculate(this.id)">*</button></td>
					</tr>
					<tr>
						<td></td>
						<td><button id="nine" value="9" onclick="changeText(this.id)">9</button></td>
						<td></td>
						<td><button id="divide" value="/" onclick="calculate(this.id)">/</button></td>
					</tr>
					<tr>
						<td><button id="equals" value="=" onclick="equals(this.id)">=</button></td>
					</tr>
				</table>
          </div>
          <br />
			</div>
			<div class="item4" style="background-color: rgba(121, 167, 247, 0.4);">
				<p style="text-align: left; padding-left: 10px;">The-Tech-Store - &copy <?php echo date('Y'); ?></p>
			</div>
		</div>
	</body>
</html>
