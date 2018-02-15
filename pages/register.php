<?php
include('server.php');
include_once 'includes/template.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The-Tech-Store/Register</title>
		<style>
			.error {
				width: 92%;
				margin: 0px auto;
				padding: 10px;
				border: 1px soild #a94442;
				color: #a94442;
				background: #f2dede;
				border-radius: 5px;
				text-align: left;
			}
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
				#regForm {
					width: 16%;
					text-align: center;
					padding-top: 20px;
					padding-bottom: 5px;
					border-radius: 6px;
					border: 2px solid rgba(73, 86, 107, 0.2);
					margin-left: 60px;
				}
				/* Media query (Iphone 7 & 8 Plus)*/
				@media screen and (max-width: 414px){
					#container {
						border-radius: 4px;
		        margin: auto;
		        background-color: rgba(213,222,239,0.6); border-radius: 4px;
		        width: 414px;
					}
					#regForm {
						width: 72%;
						text-align: center;
						padding-top: 20px;
						padding-bottom: 5px;
						border-radius: 6px;
						border: 3px solid rgba(73, 86, 107, 0.2);
						margin-left: 60px;
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
			<form method="post" action="register.php" id="regForm">
				<!--  display validatopm errors here -->
				<?php include('errors.php'); ?>
				<fieldset>
					<legend>Register</legend>
					<label>Username</label><br/>
					<input type="text" name="username" style="border-radius: 4px;" value="<?php echo $username; ?>"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
					<label>Email</label><br/>
					<input type="text" name="email" style="border-radius: 4px;" value="<?php echo $email; ?>"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
					<label>Password</label><br/>
					<input type="password" name="password" style="border-radius: 4px;"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
					<label>Confirm Password</label><br/>
					<input type="password" name="confirmPassword" style="border-radius: 4px;"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>/><br/><br/>
					<button type="submit" name="register" style="border-radius: 4px;"
						<?php if(isset($_SESSION['username'])) { ?> disabled <?php } ?>>Register</button></br></br>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="item4" style="background-color: rgba(121, 167, 247, 0.4);">
		<p style="text-align: left; padding-left: 10px;">The-Tech-Store - &copy <?php echo date('Y'); ?></p>
	</div>
</div>
</body>
</html>
<!--
*What to add:
	- If entered email is already associated with an account, then prevent register of email.
-->
<?php
	if(isset($_SESSION['username'])) { ?>
		<script>alert("You've already logged in.");</script>
	<?php }
?>
