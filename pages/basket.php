<?php
include_once 'includes/session.php';
include_once 'includes/template.php';
$connect = mysqli_connect('localhost', 'root', '', 'shopping');
$connectReg = mysqli_connect('localhost', 'root', '', 'registration');

// Connect to the basket of the logged user
// We need to retrieve 'item_ids' from database of the specified username
if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$basket = array();

	$quer = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($connectReg, $quer);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)) {
			$ids = $row['item_ids'];
			// Split 'item_ids' to individual ids representing each product
			$ids_split = str_split($ids, 1);
			// Foreach, push to array
			foreach ($ids_split as $key => $value) {
				array_push($basket, $value);
			}
			$_SESSION['cart'] = $basket;
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The-Tech-Store/Basket</title>
		<!-- A javascript library for formatting and manipulating numbers -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
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
          <h3 style="padding-top: 10px;">Order Details</h3>
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
              	<th id="tableHeader" width="40%">Item Name</th>
              	<th id="tableHeader" width="10%">Quantity</th>
              	<th id="tableHeader" width="20%">Price</th>
              	<th id="tableHeader" width="15%">Sub-Total</th>
              	<th id="tableHeader" width="5%">Action</th>
              </tr>
              <?php
                if(!empty($_SESSION["cart"]))	{
									$total = 0;

									// Foreach loop - looping through all ids from cart session
									$price_array = array();
                  foreach($_SESSION['cart'] as $key => $value)	{

										$item_id = array();
										$selector_id = array();

										$sql = "SELECT * FROM tbl_product WHERE id='$value'";
										$result = mysqli_query($connect, $sql);
										if(mysqli_num_rows($result) > 0) {
											while($row = mysqli_fetch_array($result)) {
												$id = $row['id'];
												$name = $row['name'];
												$selector = $row['selectorId'];
												$price = $row['price'];

												$quantity = '<select id=$selectorId onchange="quantityFunction(this, $selectorId)">
																			<option>1</option>
																			<option>2</option>
																			<option>3</option>
																		</select>';

												// push item_id to array
												array_push($item_id, $id);
												// push selector to array
												array_push($selector_id, $selector);
												// Place each price of item into array
												array_push($price_array, $price);
											}
										}
							?>
              <tr>
                <td id="tableData"><?php if (isset($name)) {echo $name;} ?></td>
                <td id="tableData"><?php if (isset($quantity)) {echo $quantity;} ?></td>
                <td class="tablePrice">£ <?php if(isset($price)) {echo $price;} ?></td>
								<td class="tableTPrice">£ <?php if(isset($price)) {echo $price;} ?></td>
                <td id="tableData"><a href="shopping.php?action=delete&id=<?php echo $id; ?>"><span class="text-danger">Remove</span></a></td>
              </tr>
              <?php
                }
								$tota = 0;
								foreach ($price_array as $key => $value) {
									$tota += $value;
								}
              ?>
              <tr>
								<td colspan="1" align="left" style="background-color: #4CAF50; color: white;"><a href="shopping.php?removeAll=delete&id=<?php echo $id; ?>"><span class="text-danger">Remove All</span></a></td>
                <td colspan="2" align="right" style="background-color: #4CAF50; color: white;">Total</td>
                <td class="tot" align="center" style="background-color: #4CAF50; color: white;">£ <?php echo number_format($tota, 2); ?></td>
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
			<div class="item4" style="background-color: rgba(121, 167, 247, 0.4);">
				<p style="text-align: left; padding-left: 10px;">The-Tech-Store - &copy <?php echo date('Y'); ?></p>
			</div>
		</div>
	</body>
</html>
<script>
	function quantityFunction(q, key) {
		var finalTotal = 0;
		var priceArray = [];
		// Prices of the individual item
		var prices = document.querySelectorAll('.tablePrice');
		prices.forEach(function(subPrice){
			var subTotal = subPrice.textContent;
			// Replace the '£' sybol with an empty space, since we want just the numerical value of subTotal
			var subTotalValue = subTotal.replace("£",'');
			priceArray.push(subTotalValue);
		});

		var pricesT = document.querySelectorAll('.tableTPrice');
		var newArray = [];
		var keys = Array.from(key);

		var priceArrayLength = <?php echo sizeof($price_array) ?>;
		if(priceArrayLength == 1) {
			var b = key.value;
			newArray.push(b);
		}else {
			keys.forEach(function(q){
				var a = q.value;
				newArray.push(a);
			});
		}

		// For loop to go through entire basket
		for(var j=0; j<priceArrayLength; j++) {
			var q = newArray[j];
			var p = priceArray[j];
			var sub = q * p;
			pricesT[j].innerHTML = '£ ';
			pricesT[j].innerHTML += sub;
			pricesT[j].innerHTML += '.00';
			finalTotal += sub;

			// Add all subTotals, and update the totalString
			var totalString = numeral(finalTotal).format('0,0');
			var tot = document.querySelector('.tot');
			tot.innerHTML = '£ ';
			tot.innerHTML += totalString;
			tot.innerHTML += '.00';
		}
	}
</script>
