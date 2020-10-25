<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes and Bakes | Your Orders</title>
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <!--icons-->
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link rel="stylesheet" type="text/css" href="orderscss.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <!--Javascript-->
    <script src="mainjs.js"></script>
    <style>
        .inline-data
        {
            margin-top:2%;
        }
    </style>
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
    <!-- Orders start -->
    <h4 class="current-page">Profile > <span class="active">Your Orders</span></h4>
    <h1 class="order-heading">Your Orders</h1>
    <div class="orders">
        <?php
            if(isset($_SESSION['email']))
            {
                if($_SESSION['email']!='admin@gmail.com')
                {
                    $sql="SELECT * FROM orderdetails o JOIN  recipientdetails r  ON o.recipientid=r.recipientid WHERE o.userid=?";
                    $stmt= mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location:./homepage.php?error=sqlerror1");
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
                            $sql2="SELECT name,img1 from item where itemid=?";
                            $stmt2= mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt2,$sql2))
                            {
                                header("Location:./homepage.php?error=sqlerror2");
                                exit();
                            }
                            else
                            {
                                mysqli_stmt_bind_param($stmt2,"i",$row['itemid']);
                                mysqli_stmt_execute($stmt2);
                                $result2= mysqli_stmt_get_result($stmt2);
                                if($row2 = mysqli_fetch_assoc($result2))
                                {
                                    $quantity=$row['quantity'];
                                    $price=$row['price'];
                                    $itemname=$row2['name'];
                                    $img1=$row2['img1'];
                                    $address=$row['address'];
                                    $contactnumber=$row['contactnumber'];
                                    $name=$row['fullname'];
                                    $date=$row['deliverydate'];
                                    $status=$row['status'];
                                    $orderid=$row['orderid'];
                                    echo "<div class='order'>
                                            <div class='orderimgdiv'>
                                                <img src='./itemimages/$img1'  class='orderimg'>
                                            </div>
                                            <div class='orderdesc'>
                                                <h2 class='ordername'>$itemname </h2>
                                                <span class='cost'> ₹ $price</span>
                                                <span class='quantity'><span class='label'>Quantity :</span>$quantity</span><br>";
                                                if($status=='Order Cancelled')
                                                {
                                                    echo "<div class='status' style='color:red'>$status</div>";
                                                }
                                                else if($status=='Order Delivered')
                                                {
                                                    echo "<div class='status' style='color:green'>$status</div>";
                                                }
                                                else
                                                {
                                                    echo "<div class='status'>$status</div>";
                                                }
                                                echo "
                                                <button class='detail-btn'><a href='itempage.php?itemname=$itemname'>View Details</a></button>";
                                                if($status=='Order Placed')
                                                {
                                                    echo "<button class='cancelorder'><a href='../includes/deleteorderitem.php?orderid=$orderid'>Cancel Order</a></button>";
                                                }
                                             echo "       
                                            </div>
                                            <div class='deliver-details'>
                                                <div class='inlinedetails'>
                                                    <div class='date'>
                                                        <p class='label'>Delivered on</p>
                                                        $date
                                                    </div>
                                                    <div class='deliverto'>
                                                        <p class='label'>Ship to</p>
                                                        $name  
                                                    </div>
                                                </div>
                                                <div class='inlinedetails'>
                                                    <div class='deliverto inline-data'>
                                                        <p class='label'>Contact:&nbsp;</p>
                                                        $contactnumber 
                                                    </div>
                                                </div>
                                                <div class='address'>
                                                    $address
                                                </div>   
                                            </div>
                                        </div>";
                                        
                                }

                            }
                            
                        }
                        if ($flag==0)
                        {
                            echo "<h2>No items ordered till date.</h2>";
                            exit();
                        }    
                    }
                        
                } 
                else
                {
                    header("Location:./homepage.php?error=Admin connot access this page!");
                    exit();
                }
            }
            else
            {
                header("Location:./homepage.php?error=Sign in or Sign up");
                exit();
            }
        ?>
    </div>
    <!-- Orders end -->
    </body>
</html>