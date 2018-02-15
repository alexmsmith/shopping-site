<?php
	// Include a session initialisation for the user
	include_once 'includes/session.php';
	// Template includes menu,submenu, title, logo and jQuery script
	include_once 'includes/template.php';
  $connectReg = mysqli_connect('localhost', 'root', '', 'registration');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forgot Password</title>
		<style>
			/* Place Grid Layout in external style sheet */
			<!-- Grid Layout -->
			.item1 { grid-area: header; }
			.item2 { grid-area: menu; }
			.item3 { grid-area: main; }
			.item4 { grid-area: footer; padding-top: 5px;}

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
						<?php
              //If the user has already logged in
              if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                // Update forgotten password for user in database
                /* Randomly generate a string of characters to represent default Password.
                    This can be changed by the user within some account settings.
                */
                $length = 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                  $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                echo 'This is your new password: '.$randomString;
                //MD5 password
                $md5Password = md5($randomString);
                $sql = "UPDATE users SET password='$md5Password' WHERE username='$username'";
                $result = mysqli_query($connectReg, $sql);
                "<script>alert('Password has been updated and stored in database');</script>";
                // Need to be redirected back to the home page
              }
              else {
                // If you are not logged in, then enter username in textfield and update database
                ?>
                <br>
                <form name="forgot_pass" method="POST" action="send_forgot_pass.php">
                  <label>Enter your email: </label>
                  <input type="text" name="emailField" placeholder="Enter valid email" />
                  <input type="submit" value="Submit" />
                </form>
                <?php
              }
            ?>
          </div>
          <br />
			</div>
			<div class="item4" style="background-color: rgba(121, 167, 247, 0.4);">
				<p style="text-align: left; padding-left: 10px;">The-Tech-Store - &copy <?php echo date('Y'); ?></p>
			</div>
		</div>
	</body>
</html>
