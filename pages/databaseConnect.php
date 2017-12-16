<?php
	//Default xammp user is 'root'
	$user = 'root';
	//Default xammp pass is ''
	$pass = '';
	//Name of database
	$db = 'testdb';
	
	//If this expression doesn't go well, then die (terminates program)
	$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	
	//If die(), then the echo statement won't execute
	echo "Great work!";
?>