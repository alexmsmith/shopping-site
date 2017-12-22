<?php
	/* Session variables solve this problem by storing user information to be used across multiple pages (e.g. username, favorite color, etc).
	By default, session variables last until the user closes the browser. So; Session variables hold information about one single user,
	and are available to all pages in one application.
	*/
	session_start();

	$username = "";
	$email = "";
	$errors = array();
	$_SESSION['success'] = "";


	// Connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// If the register button is clicked
	// isset() function is used to check whether a variable is set or not
	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);

		// Ensure that form fields are filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if($password != $confirmPassword) {
			array_push($errors, "The two passwords do not match");
		}

		// If there are no errors, save user to database
		if (count($errors) == 0) {
				$passwordMD5 = md5($password); // Encrypt password before storing in database (security)
				$sql = "INSERT INTO users (username, email, password)
							VALUES('$username', '$email', '$passwordMD5')";
				mysqli_query($db, $sql);
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php'); // Redirect to home page
		}
	}

	// log user in from login page
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		// Ensure that form fields are filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password); // Encrypt password before comparing with that from database
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) == 1) {
				// Log user in
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php'); // Redirect to home page
			}else {
				array_push($errors, "Wrong username/password combination");
			}
 		}
	}
?>
