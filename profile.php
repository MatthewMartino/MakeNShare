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
        <div id="account-info">
            <h1>My Info</h1>
            <h2><?=$_SESSION['u_first']." ".$_SESSION['u_last']." (".$_SESSION['u_uid'].")"?></h2>
            <h3><?=$_SESSION['u_email']?></h3>
            <button onclick="window.location.href='logout.php'" id="logout-button">LOGOUT</button>

            <h1>My Uploads</h1>
            <?php
              $userid = $_SESSION['u_id'];
              $query = "SELECT * FROM uploads WHERE user_id = '$userid'";
              $result = mysqli_query($mysqli, $query); 
              $num_rows = mysqli_affected_rows($mysqli); 

              echo "<h2>$num_rows uploads</h2>"; 


              if ($result && $num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo "
                         <a href=''><h3> - ".$row['file_name']."</h3><a>
                       ";
                }
              }

            ?> 
        </div>




        <div id="printer-section-header"></div>
        <div id="printer-section">
            <div class="printer-tile"></div>
            <div class="printer-tile"></div>
        </div>
        <div id="models-section-header"></div>
        <div id="models-section">
            <div class="model-tile"></div>
            <div class="model-tile"></div>
            <div class="model-tile"></div>
        </div>
    </div>
    <div id="footer">
        
    </div>
</div>


<?php 
    require_once("sitewide/footer.php");
?>