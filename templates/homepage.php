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
                background-image:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),url("Images/background1.jpg");
                width:100%;
                height:55vh;
                background-repeat: no-repeat;
                background-size: cover; 
            }
    </style>
</head>
<body>
    <?php
        if(isset($_SESSION['email']))
        {
            if($_SESSION['email']=='admin@gmail.com')
            require "headeradmin.php";
            else
            require "header.php";
        }
        else
        require "header.php";
        require "../includes/dbhinc.php";
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
        <?php
            
            $sql4="SELECT * FROM item ORDER BY star DESC LIMIT 5";
            $result4 = mysqli_query($conn,$sql4);
            while($row4 = mysqli_fetch_assoc($result4)){
                $img1=$row4['img1'];
                $name=$row4['name'];
                $quantityprice=$row4['quantityprice'];
                $qp=explode("\n",$quantityprice);
                $qp=explode(":",$qp[0]);
                $quantity=$qp[0];
                $price=$qp[1];
                $rating=$row4['rating'];
                $star=$row4['star'];
                echo "<a href='itempage.php?itemname=$name'>
                        <div class='recommends'>
                            <img src='./itemimages/$img1' class='item-img'>
                            <div class='itemdesc1'>
                                <p class='item-name'>$name</p>
                                <span class='item-price'>$price</span>
                                <span class='quantity-sml'><span class='label'>Quantity :</span>$quantity</span>
                                <p class='rating'>";
                                for($i=1;$i<=$star;$i++)
                                {
                                    echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                }
                                for($i=1;$i<=5-$star;$i++)
                                {
                                    echo "<i class='fa fa-star star-null'  aria-hidden='true'></i>";
                                }
                                echo "$rating
                                </p>
                            </div>
                        </div>
                    </a>";
            }
            mysqli_close($conn);
        ?>        
            <hr>
        </div>
</div>
<!--Contents end-->
</body>
</html>

    
