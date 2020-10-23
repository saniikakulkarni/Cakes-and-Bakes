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
    <!--Popup Sign in start-->
    <div class=popupdiv id=popupid>
        <div class="box">
            <form action="">
                <h1 class="heading">Sign In</h1><span class="cross" onclick="popupclose()">X</span>
                <input class=forminput type="email" placeholder="E-mail id" id="email" required>
                <input class=forminput type="password" placeholder="Password" id="password" required>
                <br>
                <button class=popup type="submit">Sign In</button>
                <div class="small">Don't have an account? <a href="#" onclick="popupsignup()">Create account</a></div>
            </form> 
        </div>
    </div> 
    <!--Popup Sign in end-->

    <!--Popup Sign up start-->
    <div class=popupdiv id=popupid2>
        <div class="box" id=signupbox>
            <form action="">
                <h1 class="heading">Sign Up</h1><span class="cross" onclick="popupsignupclose()" id=crosssignup>X</span>
                <input class=forminput type="text" placeholder="Full Name" id="fullname" required>
                <input class=forminput type="email" placeholder="E-mail id" id="email" required>
                <input class=forminput type="password" placeholder="Password" id="password" required>
                <input class=forminput type="password" placeholder="Confirm Password" id="password" required>
                <br>
                <button class=popup type="submit">Sign Up</button>
                <div class="small">Already have an account? <a href="#" onclick="popup()">Sign In</a></div>
            </form> 
        </div>
    </div>
    <!--Popup Sign up end--> 


    <!-- Orders start -->
    <h4 class="current-page">Profile > <span class="active">Your Orders</span></h4>
    <h1 class="order-heading">Your Orders</h1>
    <div class="orders">
        <div class="order">
            <div class="orderimgdiv">
                <img src="images/cake6.jpg" alt="" class="orderimg">
            </div>
            <div class="orderdesc">
                <h2 class="ordername">Butterscotch cake</h2>
                <p class="cost">₹ 400</p>
                <p class="quantity"><span class="label">Quantity :</span> 1Kg</p>
                <button class="detail-btn">View Details</button>  
                <button class="cancelorder">Cancel Order</button>
            </div>
            <div class="deliver-details">
                <div class="inlinedetails">
                    <div class="date">
                        <p class="label">Delivered on</p> 
                        31 December, 2020
                    </div>
                    <div class="deliverto">
                        <p class="label">Ship to </p> 
                        Sanika Kulkarni
                    </div>
                </div>
                <div class="address">
                    <p class="label">Address</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, voluptatum! Praesentium maxime ratione quod nisi. 
                </div>
            </div>
        </div>

        <h2 class="old-orders"></h2>

        <div class="order">
            <div class="orderimgdiv">
                <img src="Images/chococake1.1.PNG" alt="" class="orderimg">
            </div>
            <div class="orderdesc">
                <h2 class="ordername">Cream Drop Cake</h2>
                <p class="cost">₹ 500</p>
                <p class="quantity"><span class="label">Quantity :</span> 1/2Kg</p>
                <button class="detail-btn">View Details</button>  
            </div>
            <div class="deliver-details">
                <div class="inlinedetails">
                    <div class="date">
                        <p class="label">Delivered on</p> 
                        31 December, 2020
                    </div>
                    <div class="deliverto">
                        <p class="label">Ship to </p> 
                        Sanika Kulkarni
                    </div>
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                </div>
                <div class="address">
                    <p class="label">Address</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, voluptatum! Praesentium maxime ratione quod nisi. 
                </div>
            </div>
        </div>

        <div class="order">
            <div class="orderimgdiv">
                <img src="images/cake5.jpg" alt="" class="orderimg">
            </div>
            <div class="orderdesc">
                <h2 class="ordername">Dark Forest cake</h2>
                <p class="cost">₹ 400</p>
                <p class="quantity"><span class="label">Quantity :</span> 1Kg</p>
                <button class="detail-btn">View Details</button>  
            </div>
            <div class="deliver-details">
                <div class="inlinedetails">
                    <div class="date">
                        <p class="label">Delivered on</p> 
                        31 December, 2020
                    </div>
                    <div class="deliverto">
                        <p class="label">Ship to </p> 
                        Sanika Kulkarni
                    </div>
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                </div>
                <div class="address">
                    <p class="label">Address</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, voluptatum! Praesentium maxime ratione quod nisi. 
                </div>
            </div>
        </div>

        <div class="order">
            <div class="orderimgdiv">
                <img src="images/cake4.jpg" alt="" class="orderimg">
            </div>
            <div class="orderdesc">
                <h2 class="ordername">Blueberry cake</h2>
                <p class="cost">₹ 400</p>
                <p class="quantity"><span class="label">Quantity :</span> 1Kg</p>
                <button class="detail-btn">View Details</button>  
            </div>
            <div class="deliver-details">
                <div class="inlinedetails">
                    <div class="date">
                        <p class="label">Delivered on</p> 
                        31 December, 2020
                    </div>
                    <div class="deliverto">
                        <p class="label">Shipped to </p> 
                        Sanika Kulkarni
                    </div>
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                </div>
                <div class="address">
                    <p class="label">Address</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, voluptatum! Praesentium maxime ratione quod nisi. 
                </div>
            </div>
        </div>
    </div>


    <!-- Orders end -->


    </body>
</html>