<?php
	include('server.php');
	// Template includes menu, submenu, title, logo, and jQuery script
	include_once 'includes/template.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The-Tech-Store/Login</title>
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
				#container {
					border-radius: 4px;
					margin: auto;
					height: 1000px;
					padding-top: 20px;
				}
				#logForm {
					width: 19%;
					text-align: center;
					padding-top: 20px;
					border: 2px solid rgba(73, 86, 107, 0.1);
					border-radius: 6px;
					margin-left: 280px;
				}
				.text-box {
					width: 600px;
					margin-left: 570px;
					margin-top: -280px;
				}
				/* Media query (Iphone 7 & 8 Plus)*/
				@media screen and (max-width: 414px){
					#container {
						border-radius: 4px;
		        margin: auto;
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
					#logForm {
						width: 100%;
						text-align: center;
						padding-top: 20px;
						border: 1px solid grey;
						border-radius: 6px;
						margin-left: 0px;
					}
					.text-box {
						width: 98%;
						margin: auto;
						margin-top: 20px;
						margin-left: 0px;
					}
				}
		</style>
	</head>
	<body>
	<div class="grid-container">
		</br>
			<div class="item3">
				<div id="container">
					<form method="post" action="login.php" id="logForm">
						<!--  display errors here -->
						<?php include('errors.php'); ?>
						<fieldset>
							<legend>Login</legend><br/>
							<label>Username</label><br/>
							<input type="text" name="username" style="border-radius: 4px;" <?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
							<label>Password</label><br/>
							<input type="password" name="password" style="border-radius: 4px;" <?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
							<button type="submit" name="login" style="border-radius: 4px;" <?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>>Login</button></br></br>
							<p>Not a member? <a href="register.php">Sign up</a></p>
							<a href="forgot.php">Forgot Password?</a></p>
						</fieldset>
					</form>
					<div class="text-box">
						<p id="text-info">
						Please Sign Into Your Account To Access User Privileges.
						If You're Not Already A Member, You Can Sign Up To Create
						A New Account With Us. It's Free To Start A Shopping Spree!
						<br><br>
						<strong>Benefits Of Becoming A Member:</strong><br>
						<b>1.</b> Gain 10 Free Tokens!<br>
						<b>2.</b> User Preferences<br>
						<b>3.</b> Receive Special Offers
						</p>
					</div>
				</div>
			</div>
			<div class="item4" style="background-color: rgba(121, 167, 247, 0.4);">
				<p style="text-align: left; padding-left: 10px;">The-Tech-Store - &copy <?php echo date('Y'); ?></p>
			</div>
		</div>
	</body>
</html>
<?php
	if(isset($_SESSION['username'])) { ?>
		<script>alert("You've already logged in.");</script>
	<?php }
?>
