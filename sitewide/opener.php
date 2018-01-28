
<?php

// This is the opener file. This is where the database should be configured. 

// Include config
// Connect to DB
// Start session

$db = include('config.php');
	
	// $host = $db['host'];
	// $user = $db['user'];
	// $pass = $db['pass'];
	// $name = $db['name'];

	$mysqli = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);

	$msg = "";

	if (!$mysqli) {
		$msg = "Error: Could not connect to the database: " . mysqli_connect_error();
		die();

		// die("Connection failed: " . mysqli_connect_error());
	}

	session_start();

?>

<!doctype html>
<html lang='en'>
<head>
	<meta charset="utf-8">