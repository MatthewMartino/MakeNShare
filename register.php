<?php
    require_once("sitewide/opener.php");
?>
    <title>Make N Share</title>
<?php
    require_once("sitewide/header.php"); 
?>

<div class="container">
	<div id="form-container">
		<h1>SIGN UP</h1>
		<form action="">
			<input type="text" name="fname" placeholder="First Name" class="textbox" id="fname-box"><br>
			<input type="text" name="fname" placeholder="Last Name" class="textbox" id="lname-box"><br>
				<input type="text" name="email" placeholder="Email Address" class="textbox" id="email-box"><br>
				<input type="text" name="username" placeholder="Username" class="textbox" id="username-box"><br>
				<input type="password" name="password" placeholder="Passphrase" class="textbox" id="password-box"><br>
				<input type="password" name="cpassword" placeholder="Confirm Passphrase" class="textbox" id="cpassword-box"><br>
				<input type="button" value="CREATE AN ACCOUNT" class="form-button" id="create-account-button">
		</form> 
		<img src="img/gray-logo.png" id="mini-logo">
	</div>
</div>

<?php 
    require_once("sitewide/footer.php");
?>
