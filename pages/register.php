<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Store - Register</title>
		<link rel="stylesheet" type="text/css" href="../css.css">
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
		</style>
	</head>
	<body>
		<h1>Register</h1>
		<form method="post" action="register.php">
			<!--  display validatopm errors here -->
			<?php include('errors.php'); ?>
			<fieldset>
				<legend>Register</legend><br/>
					<label>Username</label><br/>
					<input type="text" name="username" value="<?php echo $username; ?>"/><br/><br/>
					<label>Email</label><br/>
					<input type="text" name="email" value="<?php echo $email; ?>"/><br/><br/>
					<label>Password</label><br/>
					<input type="password" name="password"/><br/><br/>
					<label>Confirm Password</label><br/>
					<input type="password" name="confirmPassword"/><br/><br/>
					<button type="submit" name="register">Register</button>
			</fieldset>
		</form>
	</body>
</html>