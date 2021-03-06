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
        <div id="account-info-header"><h1>ACCOUNT INFO</h1></div>
        <div id="account-info">
            <h2><?=$_SESSION['u_first']." ".$_SESSION['u_last']." (".$_SESSION['u_uid'].")"?></h2>
            <h3><?=$_SESSION['u_email']?></h3>
            <button onclick="window.location.href='logout.php'" id="logout-button">LOG OUT</button>
        </div>
        <div id="models-section-header"><h1>MY UPLOADS</h1></div>
        <div id="models-section">
            <?php
              $userid = $_SESSION['u_id'];
              $query = "SELECT * FROM uploads WHERE user_id = '$userid'";
              $result = mysqli_query($mysqli, $query); 
              $num_rows = mysqli_affected_rows($mysqli);  

              echo"<ul id=\"upload-list\">";

              if ($result && $num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo "
                         <li class=\"upload-list-item\">

                         <form method=\"post\" action=\"download.php\">
                            <input type=\"hidden\" name=\"file\" value=".$row['file_name'].">
                            <input type=\"hidden\" name=\"id\" value=".$_SESSION['u_id'].">
                            <input class=\"upload-item\" type=\"submit\" value=".$row['file_name'].">
                         </form>


                         </li>
                       ";
                }
              }

              echo"</ul>";

              echo "<h3 id=\"total-uploads-label\">Total Uploads: $num_rows</h3>";

            ?> 
        </div>
        <div id="printers-section-header"></div>
        <div id="printers-section">
            
        </div>
    </div>
    <div id="footer">
        
    </div>
</div>


<?php 
    require_once("sitewide/footer.php");
?>