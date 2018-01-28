<?php
    require_once("sitewide/opener.php");
?>
    <title>Make N Share</title>
<?php
    require_once("sitewide/header.php"); 
?>


<div class="container">
    <div id="header">
        <img src="img/gray-logo.png" id="logo">
        <a href="home.php" id="browse-button">BROWSE</a>
        <a href="profile.php" id="profile-button">PROFILE</a>
        <a href="uploads.php" id="upload-button">UPLOAD</a>
    </div>
    <div id="content">


<?php
  $query = "SELECT * FROM uploads 
            JOIN users 
            ON uploads.user_id = users.user_id";
  $result = mysqli_query($mysqli, $query); 
  $num_rows = mysqli_affected_rows($mysqli); 

  echo "<h1>$num_rows Files Available</h1>";



  if ($result && $num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

      echo "
             <h2>".$row["user_uid"]." uploaded ".$row["file_name"]."</h2>
             <form method=\"post\" action=\"download.php\">
                <input type=\"hidden\" name=\"file\" value=".$row['file_name'].">
                <input type=\"hidden\" name=\"id\" value=".$row['user_id'].">
                <input class=\"upload-item\" type=\"submit\" value=\"Download\">
             </form>
             
           ";
    }
  }


?> 


        
    </div>
    <div id="footer">
        
    </div>
</div>


<?php 
    require_once("sitewide/footer.php");
?>