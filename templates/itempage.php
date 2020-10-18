<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes and Bakes | Item Page</title>
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link rel="stylesheet" type="text/css" href="itemcss.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="mainjs.js"></script>
</head>
<body>
    <?php
        if($_SESSION['userid']=='2')
        require "headeradmin.php";
        else
        require "header.php";
        require "../includes/dbhinc.php";
    ?>
    <!--Contents start-->
    <div class=itemcontents>
        <div class="itempicdesc">
            <div class="itempic">
                <div class="smallpicdiv">
                    <img  src="Images/chococake1.1.PNG" alt="" onmouseenter="picboxdisplay('smallpicid1','smallpicid2','smallpicid3','smallpicid4')" id=smallpicid1 class=smallpic>
                    <img  src="Images/chococake1.2.PNG" alt="" onmouseenter="picboxdisplay('smallpicid2','smallpicid1','smallpicid3','smallpicid4')" id=smallpicid2 class=smallpic>
                    <img  src="Images/chococake1.3.PNG" alt="" onmouseenter="picboxdisplay('smallpicid3','smallpicid2','smallpicid1','smallpicid4')" id=smallpicid3 class=smallpic>
                    <img  src="Images/chococake1.4.PNG" alt="" onmouseenter="picboxdisplay('smallpicid4','smallpicid2','smallpicid3','smallpicid1')" id=smallpicid4 class=smallpic>
                </div>
                <div id=bigpicdiv>
                </div>
            </div>
            <?php
                    echo "<div class='itemdesc'>
                            <div class='itemdescstart'>
                            <h1 class=item-name></h1>
                            <p class='rating'>";
                                for($i=1;$i<=$star;$i++)
                                {
                                    echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                }
                                for($i=1;$i<=5-$star;$i++)
                                {
                                    echo "<i class='fa fa-star star-null'  aria-hidden='true'></i>
                                }
                                $rating
                            </p>
                            <h2 class=pricedesc></h2>
                            <form class=orderform>
                                <h3 class=upgradeheading>Select an Upgrade</h3>
                                <select name=upgrade id=upgrade>
                                    <option value="halfkg">0.5 Kg</option>
                                </select>
                                <h4 class=pincodeline>Enter correct Pincode for hassle free timely delivery.</h4><br>
                                <div class=pindate>
                                    <div class=pincodediv>
                                        <h3 class=pincodeheading>Availability</h3>
                                        <p class=pincodeinput>Accepting Orders</p>
                                    </div>
                                    <div class=datediv>
                                        <h3 class=dateheading>Delivery Date</h3>
                                        <select name=upgrade class=dateinput>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <button class=addtocart-btn><i class='fas fa-shopping-cart'></i> Add to Cart</button><button class=ordernow-btn><i class='fas fa-bolt'></i> Order Now</button>
                            </form>
                            <hr>
                        </div>
                        <div class='itemdescend'>
                            <h2 class=descheading>Description</h2>
                            <ul class=desclist>
                                <li class=descitems><i class='fas fa-check-circle'></i> Cake Flavour- Chocolate</li>
                            </ul>
                        </div>
                    </div>  
                </div>";
                ?>
                <div class="reviews">
                    <div class="reviewsback">
                        <center><h1 class=reviewsheading>Customers Who Bought This Say...</h1></center>
                        <div class="review-container">
                            <div class=reviewstile>
                                <div class="review-inline">
                                    <img src="images/profilebackground.jpeg" alt="" class=profile-small>
                                    <p class=reviewname>Sanika Kulkarni</p>
                                </div>
                                <p class=reviewcontent>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam accusantium magnam, ut commodi nemo totam voluptatibus aut debitis ipsam excepturi. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis, ea. </p>
                            </div>
        
                            <div class=reviewstile>
                                <div class="review-inline">
                                    <img src="images/profilebackground.jpeg" alt="" class=profile-small>
                                    <p class=reviewname>Sanika Kulkarni</p>
                                </div>
                                <p class=reviewcontent>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam accusantium magnam, ut commodi nemo totam voluptatibus aut debitis ipsam excepturi. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis, ea. </p>
                            </div>
        
                            <div class=reviewstile>
                                <div class="review-inline">
                                    <img src="images/profilebackground.jpeg" alt="" class=profile-small>
                                    <p class=reviewname>Sanika Kulkarni</p>
                                </div>
                                <p class=reviewcontent>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam accusantium magnam, ut commodi nemo totam voluptatibus aut debitis ipsam excepturi. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis, ea. </p>
                            </div>
        
                           
                        </div>
                    </div>
                </div>
            
        <div class="alsolike">
            <center><h1 class=alsolikeheading>You May Also Like</h1></center>
            <div class=alsolikeback>
                <div class=alsoliketile></div>
                <div class=alsoliketile></div>
                <div class=alsoliketile></div>
                <div class=alsoliketile></div>
                <div class=alsoliketile></div>
            </div>
        </div>
    
        
</body>
<script>
</script>
</html>