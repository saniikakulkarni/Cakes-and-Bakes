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
    <div class=headerhome>
            <table class=headertable cellspacing=0>
                <tr class=headertr>
                    <td class=logotd><img class=logoimg src="Images/logo.png" alt=""></td>
                    <td class=logotexttd>Cakes and Bakes</td>
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
                    <td class=headerlinks>Contact</td>
                    <td class=headerlinks>Your Cart</td>
                </tr>
                <tr id=dropdownmenu class=dropdowntr>
                    <td colspan=3 style="visibility:hidden"></td>
                    <td id=dropdowncat colspan=1 onmouseenter="menushow()" onmouseleave="menuhide()"class=dropdowntd >
                        <ul class=dropdownlist>
                            <li class="drop-items">Cakes</li>
                            <li class="drop-items">Occassion Cakes</li>
                            <li class="drop-items">Cupcakes</li>
                            <li class="drop-items">Cookies</li>
                            <li class="drop-items">Macaroons</li>
                            <li class="drop-items">Snacks</li>
                            <li class="drop-items">Brownies</li>
                            <li class="drop-items btm-border-none">Delights</li>
                        </ul>
                    </div>
                    <td id=dropdownprofile colspan=1 onmouseenter=profileshow() onmouseleave=profilehide() class=dropdowntd id=profileshift>
                        <ul class=dropdownlist >
                            <li onclick=popupsignup(),profilehide() class="drop-items">Sign Up</li>
                            <li onclick=popup(),profilehide() class="drop-items btm-border-none">Sign In</li>
                        </ul>
                    </div>
                    <td colspan=2 style="visibility:hidden"></td>
                </tr>
            </table>       
    </div>
    <!--Header end-->

    <!--Popup Sign in start-->
    <div class=popupdiv id=popupid>
        <div class="box">
            <form method="POST" action="includes/signininc.php">
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
            <form action="includes/signupinc.php" method="POST">
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
        <div class=contentsmainheading>
            Season Specials of Cakes and Bakes 
        </div>
        <div class=tilesdiv>
            <div class=tile></div>
            <div class=tile></div>
            <div class=tile></div>
            <div class=tile></div>
            <div class=tile></div>
            <div class=tile></div>
        </div>  
</div>
<!--Contents end-->
</body>
</html>

    
