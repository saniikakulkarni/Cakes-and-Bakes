<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <link rel="stylesheet" href="admincss.css">
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link rel="stylesheet" type="text/css" href="homecss.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <script src="mainjs.js"></script>
    <title>Cakes and Bakes | Add Items</title>
</head>
<body>
    <!--Header start-->
    <div class=headeritemdisplay>
        <table class=headertable cellspacing=0>
            <tr class=headertr>
                <td class=logotd><img class=logoimg src="Images/logo.png" alt=""></td>
                <td class=logotexttd><a href="homepage.php" >Cakes and Bakes</a></td>
                <td class=searchtd>
                    <div class=searchdiv>
                        <form action="">
                            <input class="searchinput" type="search" placeholder="Search for baked goodies">
                            <button class="searchicon"><i class="fas fa-search"></i></button>
                        </form>   
                    </div>
                </td>
                <td class=headerlinks onmouseenter=menushow() onmouseleave=menuhide()>Categories</td>
                <td class=headerlinks><a href="adminadditems.php">Add Items</a></td>
                <td class=headerlinks><a href="../includes/signoutinc.php">Logout</a></td>
                <td class=headerlinks><a href="adminorders.php">Orders</a></td>
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
                    <td colspan=3 style="visibility:hidden"></td>
            </tr>
        </table>       
    </div>
    <!--Header end-->
