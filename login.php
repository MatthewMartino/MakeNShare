
<?php
    require_once("sitewide/opener.php");
?>
    <title>Make N Share</title>
<?php
    require_once("sitewide/header.php"); 
?>

<?php






?>



<div class="container">
	<div id="form-container">
		<h1>LOG IN</h1>
		<form action="">
				<input type="text" name="email" placeholder="Email Address" class="textbox" id="email-box"><br>
				<input type="password" name="password" placeholder="Passphrase" class="textbox" id="password-box"><br>
				<input type="submit" value="LOG IN" class="form-button" id="login-button">
                <button type="button" class="form-button" id="create-account-button" onclick="window.location.href='register.php'">CREATE AN ACCOUNT</button>
		</form> 
		<img src="img/gray-logo.png" id="mini-logo">
	</div>
</div>

<?php 
    require_once("sitewide/footer.php");
?>
