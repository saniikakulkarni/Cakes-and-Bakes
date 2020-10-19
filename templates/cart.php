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
        require "header.php";
        require "../includes/dbhinc.php";
    ?>
    <!-- Orders start -->
    <h4 class="current-page">Profile > <span class="active">Your Cart</span></h4>
    <h1 class="order-heading"><img src="images/cart-icon.png" alt="" class=carticon>Your Cart </h1>
    <div class="orders">
        <?php
            if(isset($_SESSION['email']))
            {
                if($_SESSION['email']!='admin@dmail.com')
                {
                    $sql="SELECT * FROM cart where userid=?";
                    $stmt= mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: ./homepage.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"s",$_SESSION['userid']);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)){
                        $quantity=$row['quantity'];
                        $price=$row['price'];
                        $itemname="Chocolate Cake";
                        echo "<div class='order'>
                                <div class='orderimgdiv'>
                                    <img src='images/cake6.jpg' class='orderimg'>
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
                    if (isset($result))
                    {
                        echo "<div class=btn-div>
                        <button class='proceed'>Proceed to pay <i class='fas fa-coins'></i></button>
                        </div>";
                    }
                    else{
                        echo "<h2>No Items Present In Cart</h2>";
                    }
                   
                }
                else
                {
                    header("Location: ./homepage.php?error=Admin doesnt have a cart");
                    exit();
                }
            }
            else
            {
                header("Location: ./homepage.php?error=Sign in or Sign up to See your cart");
                exit();
            }  
           ?>
    <!-- Orders end -->
    </body>
</html>