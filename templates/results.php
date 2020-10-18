<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes and Bakes | Results</title>
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="orderscss.css">
    <link rel="stylesheet" type="text/css" href="resultscss.css">
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <script src="mainjs.js"></script>
</head>
<body>
    <?php
        if(isset($_SESSION['userid']))
        {
            if($_SESSION['userid']=='2')
            require "headeradmin.php";
            else
            require "header.php";
        }
        else
        require "header.php";
        require "../includes/dbhinc.php";
        $category=$_GET['category'];
    ?>
    <!--Search results start-->
    <div class=searchbar>
        Results For  <span class="resultcat">"<?php echo $category;?>"</span>
    </div>
    <!--Search results end-->
    <!--Contents start-->
    <div class=contents style="background:none;">
        <div class=itemdiv>
        <?php
            
            $sql="SELECT * FROM item where category=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ./homepage.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"s",$category);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)){
                $name=$row['name'];
                $quantityprice=$row['quantityprice'];
                $qp=explode("\n",$quantityprice);
                $qp=explode(":",$qp[0]);
                $quantity=$qp[0];
                $price=$qp[1];
                $rating=$row['rating'];
                $star=3;
                echo "<a href='itempage.php?itemname=$name'>
                        <div class='items'>
                            <img src='./Images/chococake1.1.png' class='item-img'>
                            <div class='itemdesc'>
                                <p class='item-name'>$name</p>
                                <span class='item-price'>$price</span>
                                <span class='quantity'><span class='label'>Quantity :</span>$quantity</span>
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
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        ?>        
    <!--Contents end-->
    </body>
</html>