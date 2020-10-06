<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link rel="stylesheet" type="text/css" href="profilecss.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
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
                        <li onclick=popupsignup(),profilehide() class="drop-items">My Profile</li>
                        <li onclick=popup(),profilehide() class="drop-items">Track Orders</li>
                    </ul>
                </td>
                <td colspan=2 style="visibility:hidden"></td>
            </tr>
        </table>       
    </div>
    <!--Header end-->

    <!--Contents start-->
    <div class=profilecontents>
        <div class="profileedit">
            <center><h1 class=profileheading>My Profile</h1><br><p class=profileheading>*These can not be left empty</p><br></center>
            <form action="">
                <label class="profilelabel">Full Name*</label><br><br>
                <input class="profileinput" type="text" value="Sanika Kulkarni" placeholder="Full Name" required><br><br>
                <label class="profilelabel">Email-id (cannot be changed)</label><br><br>
                <input class="profileinput" type="email" disabled value="sanika.k.goa@gmaill.com" placeholder="Email-Id" required><br><br>
                <button class="profileedit-btn">Save</button>
            </form>
        </div>
    </div>
        
</body>
</html>