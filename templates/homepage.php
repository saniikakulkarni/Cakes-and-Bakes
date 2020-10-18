<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes and Bakes | Homepage</title>
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link rel="stylesheet" type="text/css" href="homecss.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <script src="mainjs.js"></script>
    <style>
            .headeritemdisplay{
                background-image:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),url("Images/background1.jpeg");
                width:100%;
                height:55vh;
                background-repeat: no-repeat;
                background-size: cover; 
            }
    </style>
</head>
<body>
    <?php
        if($_SESSION['userid']=='2')
        require "headeradmin.php";
        else
        require "header.php";
        require "../includes/dbhinc.php";
        $category=$_GET['category'];
    ?>
<!--Intro start-->
<div class=intro>
    <center class=introcontent>
        Welcome to <br><h2 class=introhead>Cakes and Bakes.</h2>
        We specialise in making sweet baked cakes to savoury snacks to complement each other. <br>
        Explore the wide range of goodies baked with love. Scroll below to see our top sellers and season specials.
    </center>
</div>
<!--Intro end-->

<!--Contents start-->
<div class=contents>
        <div class=contentsmainheading>
            Top Sellers of Cakes and Bakes
        </div>
        <div class=tilesdiv>
            <div class=tile></div>
            <div class=tile></div>
            <div class=tile></div>
            <div class=tile></div>
            <div class=tile></div>
            <hr>
        </div>
</div>
<!--Contents end-->
</body>
</html>

    
