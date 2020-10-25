<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes and Bakes | Reviews</title>
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="orderscss.css">
    <link rel="stylesheet" type="text/css" href="itemcss.css">
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <script src="mainjs.js"></script>
    <style>
        body{
            background:white;
        }
        .review-container{
            height:auto;
        }
        .reviewsback{
            margin:5% auto;
        }
    </style>
</head>
<body>
    <?php
        
        require "header.php";
        require "../includes/dbhinc.php";

        $itemid=$_GET['itemid'];
    
    ?>
        <div class="reviewsback">
            <center><h1 class=reviewsheading>All Ratings and Reviews</h1></center>
            <div class="review-container">
                <?php

                    $sql="SELECT * FROM review where itemid=?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        $_SESSION['error-message'] = 'Error!';
                        header("Location: itempage.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"s",$itemid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)){
                            $uid = $row['userid'];
                            $rating=$row['rating'];
                            $review=$row['review'];
                            $sql1="SELECT * FROM userdetails where userid=?";
                            $stmt1 = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt1,$sql1))
                            {
                                $_SESSION['error-message'] = 'Error!';
                                header("Location: itempage.php?error=sqlerror");
                                exit();
                            }
                            else
                            {
                                mysqli_stmt_bind_param($stmt1,"s",$uid);
                                mysqli_stmt_execute($stmt1);
                                $result1 = mysqli_stmt_get_result($stmt1);
                                if($row1 = mysqli_fetch_assoc($result1))
                                {
                                    $username = $row1['fullname'];
                                }
                                echo "
                                        <div class=reviewstile>
                                            <p class=reviewname>$username</p>                          
                                            <p class='rating'>";
                                                for($i=1;$i<=$rating;$i++)
                                                {
                                                    echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                                }
                                                for($i=1;$i<=5-$rating;$i++)
                                                {
                                                    echo "<i class='fa fa-star star-null'  aria-hidden='true'></i>";
                                                }
                                                echo "$rating
                                            </p>
                                            <p class=reviewcontent>$review</p>
                                        </div>
                                    ";
                            }                                           
                        }
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                ?>                   
            </div>
        </div>
        
    <!--Contents end-->
    </body>
</html>