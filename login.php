
<?php
    require_once("sitewide/opener.php");
?>
    <title>Make N Share</title>
<?php
    require_once("sitewide/header.php"); 
?>

<?php

if (!empty($_POST)) {

    $uid = mysqli_real_escape_string($mysqli, $_POST['email']);
    $pwd = mysqli_real_escape_string($mysqli, $_POST['password']);
    $pwd = sha1($pwd);

    //Check if inputs are empty 
    if (empty($uid) || empty($pwd)) {
        echo"empty fields";
        //TODO: handle no login

    } else {
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($mysqli, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            echo"problem with db";
            //TODO: handle problem

        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                if ($pwd != $row['user_pwd']) {
                    echo"wrong password";
                    //TODO: handle wrong password
                }
                else {
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    $_SESSION['loggedin'] = true;
                    header("Location: home.php");
                }
            }
        }
    }
} else {

}


?>



<div class="container">
	<div id="form-container">
		<h1>LOG IN</h1>
		<form method="post">
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
