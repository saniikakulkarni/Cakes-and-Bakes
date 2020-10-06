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
    <!--Header start-->
    <div class=headeritemdisplay>
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
                </td>
                <td id=dropdownprofile colspan=1 onmouseenter=profileshow() onmouseleave=profilehide() class=dropdowntd>
                    <ul class=dropdownlist id=profileshift>
                        <li onclick=popupsignup(),profilehide() class="drop-items">Sign Up</li>
                        <li onclick=popup(),profilehide() class="drop-items btm-border-none">Sign In</li>
                    </ul>
                </td>
                <td colspan=2 style="visibility:hidden"></td>
            </tr>
        </table>       
    </div>
    <!--Header end-->

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
    <h4 class="current-page">Profile > <span class="active">Your Cart</span></h4>
    <h1 class="order-heading"><img src="images/cart-icon.png" alt="" class=carticon>Your Cart </h1>
    <div class="orders">
        <div class="order">
            <div class="orderimgdiv">
                <img src="images/cake6.jpg" alt="" class="orderimg">
            </div>
            <div class="orderdesc">
                <h2 class="ordername">Butterscotch cake</h2>
                <p class="cost">₹ 400</p>
                <p class="quantity"><span class="label">Quantity :</span> 1Kg</p>
            </div>
            <div class="deliver-details">
                <button class="detail-btn">View Details</button>  
                <button class="cancelorder">Cancel </button>
            </div>
        </div>

        <div class="order">
            <div class="orderimgdiv">
                <img src="images/chococake1.1.PNG" alt="" class="orderimg">
            </div>
            <div class="orderdesc">
                <h2 class="ordername">Cream drop cake</h2>
                <p class="cost">₹ 400</p>
                <p class="quantity"><span class="label">Quantity :</span> 2Kg</p>
            </div>
            <div class="deliver-details">
                <button class="detail-btn">View Details</button>  
                <button class="cancelorder">Cancel </button>
            </div>
        </div>

        <div class="order">
            <div class="orderimgdiv">
                <img src="images/cake5.jpg" alt="" class="orderimg">
            </div>
            <div class="orderdesc">
                <h2 class="ordername">Chocolate Cake</h2>
                <p class="cost">₹ 400</p>
                <p class="quantity"><span class="label">Quantity :</span> 1Kg</p>
            </div>
            <div class="deliver-details">
                <button class="detail-btn">View Details</button>  
                <button class="cancelorder">Cancel </button>
            </div>
        </div>

        <div class="order">
            <div class="orderimgdiv">
                <img src="images/cake6.jpg" alt="" class="orderimg">
            </div>
            <div class="orderdesc">
                <h2 class="ordername">White forest cake</h2>
                <p class="cost">₹ 400</p>
                <p class="quantity"><span class="label">Quantity :</span> 1Kg</p>
            </div>
            <div class="deliver-details">
                <button class="detail-btn">View Details</button>  
                <button class="cancelorder">Cancel </button>
            </div>
        </div> 
    </div>
    <div class=btn-div>
        <button class="proceed">Proceed to pay <i class="fas fa-coins"></i></button>
    </div>
    


    <!-- Orders end -->


    </body>
</html>