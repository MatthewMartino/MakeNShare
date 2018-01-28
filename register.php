<?php
    require_once("sitewide/opener.php");
?>
    <title>Make N Share</title>
<?php
    require_once("sitewide/header.php"); 
?>


<?php

	if (!empty($_POST)) {

	$first = mysqli_real_escape_string($mysqli, $_POST['fname']);
	$last = mysqli_real_escape_string($mysqli, $_POST['lname']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$uid = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pwd = mysqli_real_escape_string($mysqli, $_POST['password']);
	$cpwd = mysqli_real_escape_string($mysqli, $_POST['cpassword']);

	if ($pwd != $cpwd) {
		//TODO: Handle unequal passwords.
		exit();
	}

	$pwd = sha1($pwd); 

	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		echo"Empty Fields";
		//TODO: Handle empty fields.
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || (!preg_match("/^[a-zA-Z]*$/", $last))) {
			echo"Bad Characters";
			//TODO: Handle bad characters.
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo"Bad email";
				//TODO: Handle bad email. 
			} else {
				$sql = "SELECT * FROM users WHERE user_uid= '$uid'";
				$result = mysqli_query($mysqli, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0){
					echo"User exists.";
					//TODO: Handle user exists.
				} else {
					//Insert the user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$pwd');";

					$_SESSION['u_id'] = $email;
                    $_SESSION['u_first'] = $first;
                    $_SESSION['u_last'] = $last;
                    $_SESSION['u_email'] = $email;
                    $_SESSION['u_uid'] = $uid;
                    $_SESSION['loggedin'] = true; 

					$result = mysqli_query($mysqli, $sql);
					header("Location: home.php");
				}
			}
		}
	}
} 


?>




<div class="container">
	<div id="form-container">
		<h1>SIGN UP</h1>
		<form method="post">
			<input type="text" name="fname" placeholder="First Name" class="textbox" id="fname-box"><br>
			<input type="text" name="lname" placeholder="Last Name" class="textbox" id="lname-box"><br>
				<input type="text" name="email" placeholder="Email Address" class="textbox" id="email-box"><br>
				<input type="text" name="username" placeholder="Username" class="textbox" id="username-box"><br>
				<input type="password" name="password" placeholder="Passphrase" class="textbox" id="password-box"><br>
				<input type="password" name="cpassword" placeholder="Confirm Passphrase" class="textbox" id="cpassword-box"><br>
				<input type="submit" value="CREATE AN ACCOUNT" class="form-button" id="create-account-button">
		</form> 
		<img src="img/gray-logo.png" id="mini-logo">
	</div>
</div>

<?php 
    require_once("sitewide/footer.php");
?>
