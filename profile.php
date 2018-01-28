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
        <a href="upload.php" id="upload-button">UPLOAD</a>
    </div>
    <div id="content">
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