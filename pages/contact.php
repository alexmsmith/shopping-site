<?php
// Includes a session initialisation for the user
include_once 'includes/session.php';
// Template includes menu,submenu, title, logo and jQuery script
include_once 'includes/template.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The-Tech-Store/Contact</title>
		<style>
			/* Place Grid Layout in external style sheet */
			 Grid Layout
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
				form {
					width: 400px;
					height: 500px;
					margin: auto;
					border: 2px solid rgba(73, 86, 107, 0.1);
					border-radius: 6px;
				}
				td {
					padding: 4px;

				}
				/* Media query (Iphone 7 & 8 Plus)*/
				@media screen and (max-width: 414px){
					#container {
						border-radius: 4px;
		        margin: auto;
		        background-color: rgba(213,222,239,0.6); border-radius: 4px;
		        width: 414px;
					}
					#contactTable {
						width: 390px;
						height: 500px;
						margin: auto;
						background-color: rgba(73, 86, 107, 0.2);
						border-radius: 6px;
						font-size: 11px;
					}
					#contactTable td {
						padding-right: 6px;
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
						 <h2 id="heading-two" style="margin-top: 0px;">Contact-Us</h3>
						 	<p id="text-info" style="color: black;">If you would like to contact us regarding a query, please
							 use the following options below:
							</p>
							<p id="text-info" style="color: black;"><strong>Contact Number:</strong> (+44) (0)7578267919</p>

							<p id="text-info" style="color: black;"><strong>Drop us an e-mail:</strong></p>

							<!-- Reference: http://www.freecontactform.com/email_form.php -->
 					 		<form name="contactform" method="post" action="send_form_email.php">
 								<table id="contactTable">
 									<tr>
										<td>
											<input type="text" name="first_name" maxlength="50" size="30"
												style="float: left; margin-left: 66px; padding-left: 2px; border-radius: 4px;"
												placeholder="First Name">
										</td>
 									</tr>
 									<tr>
										<td>
											<input type="text" name="last_name" maxlength="50" size="30"
												style="float: left; margin-left: 66px; padding-left: 2px; border-radius: 4px;"
												placeholder="Last Name">
										</td>
 									</tr>
 									<tr>
										<td>
											<input type="text" name="email" maxlength="80" size="30"
												style="float: left; margin-left: 66px; padding-left: 2px; border-radius: 4px;"
												placeholder="Email Address">
										</td>
 									</tr>
 									<tr>
										<td>
											<input type="text" name="telephone" maxlength="30" size="30"
												style="float: left; margin-left: 66px; padding-left: 2px; border-radius: 4px;"
												placeholder="Telephone Number">
										</td>
 									</tr>
 									<tr>
										<td>
											<textarea name="comments" maxlength="1000" cols="45" rows="15"
												style="resize: none ; margin-left: 20px; border-radius: 4px; padding-left: 2px;"
												placeholder="Enter Message Here..."></textarea>
										</td>
 									</tr>
 									<tr>
 	 									<td colspan="2" style="text-align:center;">
 	  									<input type="submit" value="Submit" style="border-radius: 4px;">
 	 									</td>
 									</tr>
 								</table>
 						</form>
           </div>
          <br />
			</div>
			<div class="item4" style="background-color: rgba(121, 167, 247, 0.4);">
				<p style="text-align: left; padding-left: 10px;">The-Tech-Store - &copy <?php echo date('Y'); ?></p>
			</div>
		</div>
	</body>
</html>
