<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes and Bakes | Cart</title>
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">

    <!--icons-->
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>

    <!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link rel="stylesheet" type="text/css" href="orderscss.css">
    <link rel="stylesheet" type="text/css" href="cartcss.css">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    
    <!--Javascript-->
    <script src="mainjs.js"></script>
</head>
<body>

    <?php
        ob_start();
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
    <!-- Cart start -->
    <h4 class="current-page">Profile > <span class="active">Your Cart</span></h4>
    <h1 class="order-heading"><img src="images/cart-icon.png" alt="" class=carticon>Your Cart </h1>
    <div class="orders">
        <?php
        
            if(isset($_SESSION['userid']))
            {
                if($_SESSION['email']!='admin@gmail.com')
                {
                    $sql="SELECT * FROM cart where userid=?";
                    $stmt= mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location:./homepage.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"i",$_SESSION['userid']);
                        mysqli_stmt_execute($stmt);
                        $flag=0;
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $flag=1;
                            $itemname="SELECT * FROM item WHERE itemid=?";
                            $stmt= mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$itemname))
                            {
                                header("Location:./homepage.php?error=sqlerror");
                                exit();
                            }
                            else
                            {
                                mysqli_stmt_bind_param($stmt,"i",$row['itemid']);
                                mysqli_stmt_execute($stmt);
                                $result2= mysqli_stmt_get_result($stmt);
                                if($row2 = mysqli_fetch_assoc($result2))
                                {
                                    $quantity=$row['quantity'];
                                    $price=$row['price'];
                                    $itemname=$row2['name'];
                                    $img1=$row2['img1'];
                                    echo "<div class='order'>
                                            <div class='orderimgdiv'>
                                                <img src='./itemimages/$img1' class='orderimg'>
                                            </div>
                                            <div class='orderdesc'>
                                                <h2 class='ordername'>$itemname</h2>
                                                <p class='cost'>₹ $price</p>
                                                <p class='quantity'><span class='label'>Quantity :</span> $quantity</p>
                                            </div>
                                            <div class='deliver-details'>
                                                <button class='detail-btn'>View Details</button>  
                                                <button class='cancelorder'>Cancel </button>
                                            </div>
                                        </div>";
                                }

                            }
                        
                        }
                        if ($flag==1)
                        {
                            echo "<div class=btn-div>
                            <button class='proceed'><a href='payment.php'>Proceed to pay</a><i class='fas fa-coins'></i></button>
                            </div>";
                        }
                        else
                        {
                            echo "<h2>No Items Present In Cart</h2>";
                        }    
                    }
                    
                } 
                else
                {
                    header("Location:./homepage.php?error=Admin doesnt have a cart");
                    exit();
                }
            }
            else
            {
                header("Location:./homepage.php?error=Sign in or Sign up");
                exit();
            }
        ?>
    <!-- Cart end -->
    </body>
</html>