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
                            <li  class="drop-items">My Profile</li>
                            <li  class="drop-items">Address Book</li>
                            <li  class="drop-items">Track Order</li>
                            <li class="drop-items btm-border-none">Logout</li>
                        </ul>
                    </div>
                    <td colspan=2 style="visibility:hidden"></td>
                </tr>
            </table>       
    </div>
    <!--Header end-->
    </body>
</html>