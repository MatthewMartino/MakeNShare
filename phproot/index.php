<?php

	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php 
			if (isset($_SESSION['u_id'])) {
				echo "You're logged in!";
				//echo "Welcome ".u_id."!"
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
