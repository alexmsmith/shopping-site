<?php
// Includes a session initialisation for the user
include_once 'includes/session.php';
// Logout
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: home.php');
}
// Template includes menu, submenu, title, logo and jQuery script
include_once 'includes/template.php';

$connectReg = mysqli_connect('localhost', 'root', '', 'registration');
// We need to retrieve 'item_ids' from database of the specified username
if (isset($_SESSION['username'])) {
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
		<title>The-Tech-Store/Home</title>
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
			<div class="item3" style="z-index: -1;">
					<!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
  				<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin: auto; margin-top: 20px; width: 60%;">
    				<!-- Indicators -->
    				<ol class="carousel-indicators">
      				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      				<li data-target="#myCarousel" data-slide-to="1"></li>
      				<li data-target="#myCarousel" data-slide-to="2"></li>
    				</ol>
						<!-- Wrapper for slides -->
    				<div class="carousel-inner" style="z-index: -1; border-radius: 6px; border: solid black 1px;">
      				<div class="item active">
        				<img src="../images/Carousel/switch.jpg" class="img-rounded" alt="nintendo_switch" style="width: 100%; margin: auto;">
      				</div>

      				<div class="item">
        				<img src="../images/Carousel/ps4.jpg" class="img-rounded" alt="ps4" style="width:100%; margin: auto; z-index: -1;">
      				</div>

      				<div class="item">
        				<img src="../images/Carousel/xbox.jpg" class="img-rounded" alt="xbox" style="width:100%; margin: auto; z-index: -1;">
      				</div>
    				</div>
						<!-- Left and right controls -->
    				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      				<span class="glyphicon glyphicon-chevron-left"></span>
      				<span class="sr-only">Previous</span>
    				</a>
    				<a class="right carousel-control" href="#myCarousel" data-slide="next">
      				<span class="glyphicon glyphicon-chevron-right"></span>
      				<span class="sr-only">Next</span>
    				</a>
  				</div>
        <br />
				<div id="container" style="padding-top: 20px;">
					<p></p>
				</div>
			</div>
			<div class="item4" style="background-color: rgba(121, 167, 247, 0.4);">
				<p style="text-align: left; padding-left: 10px;">The-Tech-Store - &copy <?php echo date('Y'); ?></p>
			</div>
		</div>
	</body>
</html>
