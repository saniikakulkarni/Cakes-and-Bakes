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
</head>
<body>
    <!--Header start-->
    <div class=headeritemdisplay>
            <table class=headertable cellspacing=0>
                <tr class=headertr>
                    <td class=logotd><img class=logoimg src="Images/logo.png" alt=""></td>
                    <td class=logotexttd><a href="adminhome.php" class=homelink>Cakes and Bakes</a></td>
                    <td class=searchtd>
                        <div class=searchdiv>
                            <form action="">
                                <input class="searchinput" type="search" placeholder="Search for baked goodies">
                                <button class="searchicon"><i class="fas fa-search"></i></button>
                            </form>   
                        </div>
                    </td>
                    <td class=headerlinks onmouseenter=menushow() onmouseleave=menuhide()>Categories</td>
                    <td class="headerlinks popupmodal" onmouseenter=profileshow() onmouseleave=profilehide()>Profile</td>
                    <td class=headerlinks>Help</td>
                    <td class=headerlinks>Your Cart</td>
                </tr>
                <tr id=dropdownmenu class=dropdowntr>
                    <td colspan=3 style="visibility:hidden"></td>
                    <td id=dropdowncat colspan=1 onmouseenter="menushow()" onmouseleave="menuhide()"class=dropdowntd >
                        <ul class=dropdownlist>
                        <li class="drop-items"><a href="results.php?category=Cakes">Cakes</a></li>
                            <li class="drop-items"><a href="results.php?category=Occasion Cakes">Occassion Cakes</a></li>
                            <li class="drop-items"><a href="results.php?category=Cupcakes">Cupcakes</a></li>
                            <li class="drop-items"><a href="results.php?category=Cookies">Cookies</a></li>
                            <li class="drop-items"><a href="results.php?category=Macaroons">Macaroons</a></li>
                            <li class="drop-items"><a href="results.php?category=Snacks">Snacks</a></li>
                            <li class="drop-items"><a href="results.php?category=Brownies">Brownies</a></li>
                            <li class="drop-items btm-border-none"><a href="results.php?category=Delights">Delights</a></li>
                        </ul>
                    </td>
                    <td id=dropdownprofile colspan=1 onmouseenter=profileshow() onmouseleave=profilehide() class=dropdowntd id=profileshift>
                        <ul class=dropdownlist >
                            <?php 
                                if(isset($_SESSION['userid']))
                                {
                                    echo "<li  class='drop-items'><a href='profile.php'>My Profile</a></li>
                                    <li  class='drop-items'><a href='track-order.php'>Track Order</a></li>
                                    <li class='drop-items btm-border-none'><a href='../includes/signoutinc.php'>Logout</a></li>";
                                }
                                else
                                {
                                    echo "<li onclick=popupsignup(),profilehide() class='drop-items'>Sign Up</li>
                                        <li onclick=popup(),profilehide() class='drop-items btm-border-none'>Sign In</li>
                                        ";
                                }
                            ?>
                        </ul>
                    </td>
                    <td colspan=1 style="visibility:hidden"></td>
                </tr>
            </table>       
    </div>
    <!--Header end-->

    <!--Popup Sign in start-->
    <div class=popupdiv id=popupid>
        <div class="box">
            <form method="POST" action="../includes/signininc.php">
                <h1 class="heading">Sign In</h1><span class="cross" onclick="popupclose()">X</span>
                <input class=forminput type="email" placeholder="E-mail id" id="email" name="email" required >
                <input class=forminput type="password" placeholder="Password" id="password" name="pwd" required>
                <br>
                <button class=popup type="submit" name="signin-btn">Sign In</button>
                <div class="small">Don't have an account? <a href="#" onclick="popupsignup()">Create account</a></div>
            </form> 
        </div>
    </div> 
    <!--Popup Sign in end-->

    <!--Popup Sign up start-->
    <div class=popupdiv id=popupid2>
        <div class="box" id=signupbox>
            <form action="../includes/signupinc.php" method="POST">
                <h1 class="heading">Sign Up</h1><span class="cross" onclick="popupsignupclose()" id=crosssignup>X</span>
                <input class=forminput type="text" placeholder="Full Name" id="fullname" name="fullname" pattern="[a-zA-Z ]*" title="Must contain only letters" required>
                <input class=forminput type="email" placeholder="E-mail id" id="email" name="email" required>
                <input class=forminput type="password" placeholder="Password" id="password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <input class=forminput type="password" placeholder="Confirm Password" id="password" name="confirm-pwd" required>
                <br>
                <button class=popup type="submit" name="signup-btn" onclick=passwordequal()>Sign Up</button>
                <div class="small">Already have an account? <a href="#" onclick="popup()">Sign In</a></div>
            </form> 
        </div>
    </div>
    <!--Popup Sign up end-->