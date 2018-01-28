<!-- This is the header page. CSS and other links should be added here.  -->

 <!--Style Sheets-->
 <?php
 		$this_page = substr(strtolower(basename($_SERVER['PHP_SELF'])),0,strlen(basename($_SERVER['PHP_SELF']))-4);
 ?>

    <link rel="stylesheet" type="text/css" href="stylesheets/<?=$this_page?>.css">
    
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900, 500, 400, 300" rel="stylesheet"> 

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#e74c3c">

    <meta name="theme-color" content="#ffffff"> 
</head>
<body>

<?php
	if($_SESSION['loggedin'] == true && ($this_page == "login" || $this_page == "register")) {
		header("Location: home.php");
	}
	else if($_SESSION['loggedin'] == false && !($this_page == "login" || $this_page == "register" || $this_page == "index" || $this_page == "uploads")) {
		header("Location: index.php");
	}
?>