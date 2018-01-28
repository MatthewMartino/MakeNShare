<?php
    require_once("sitewide/opener.php");
?>
    <title>Make N Share</title>
<?php
    require_once("sitewide/header.php"); 
?>


<?php

	if (!empty($_FILES["fileToUpload"])) {
		// Where the file is going to be placed 
		$userid = $_SESSION['u_id'];
		$target_path = './uploads/'.$userid.'/';

		if (!file_exists($target_path)) {
    		mkdir($target_path, 0777, true);
		}

		$uploadOk = 1;
		if (file_exists($target_path. basename( $_FILES['fileToUpload']['name']))) {
		    echo "File already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
		    echo "STL is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		$FileType = strtolower(pathinfo($target_path. basename( $_FILES['fileToUpload']['name']),PATHINFO_EXTENSION));
		if($FileType != "stl") {
		    echo "Only stl files are allowed.";
		    $uploadOk = 0;
		}

		if($uploadOk != 0) {

			$target_path = $target_path. basename( $_FILES['fileToUpload']['name']); 

			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) 
			{
			 echo "The file ".  basename( $_FILES['fileToUpload']['name']). 
			 " has been uploaded";

			$filename = basename( $_FILES['fileToUpload']['name']);
			$query = "INSERT INTO uploads
              SET user_id ='$userid',
                  file_name ='$filename', 
                  file_path = '$target_path'"; 

		    mysqli_query($mysqli, $query); 


			} 
			else
			{
			 echo "There was an error uploading the file, please try again!";
			}

		}

	}

?>


<div class="container">
    <div id="header">
        <img src="img/gray-logo.png" id="logo">
        <a href="home.php" id="upload-button">BACK</a>
    </div>
    <div id="content">


	<form method="post" enctype="multipart/form-data">
	    Select stl to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload File" name="submit">
	</form>
 
        
    </div>
    <div id="footer">
        
    </div>
</div>


<?php 
    require_once("sitewide/footer.php");
?>