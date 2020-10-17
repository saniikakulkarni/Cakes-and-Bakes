<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes and Bakes | Profile</title>
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link rel="stylesheet" href="ordercss.css">
    <link rel="stylesheet" type="text/css" href="profilecss.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
    
    <script src="mainjs.js"></script>
</head>
<body>
    <?php
        require "header.php"
    ?>
    <!--Contents start-->
    <div class=profilecontents>
        <div class=profileedit>
            <center><p class=profileheading>*These can not be left empty</p><br></center>
            <form action="">
                <label class="profilelabel">Full Name*</label><br><br>
                <input class="profileinput" type="text" value="Sanika Kulkarni" placeholder="Full Name" required><br><br>
                <label class="profilelabel">Email-id (cannot be changed)</label><br><br>
                <input class="profileinput" type="email" disabled value="sanika.k.goa@gmaill.com" placeholder="Email-Id" required><br><br>
                <button class="profileedit-btn">Save</button>
            </form>
        </div>
        <div class="paymentcontent">
            <div class=addressback id=backaddress>
                <form onsubmit="displaycontent('backpayment','backaddress','backsummary','backsuccess','backcredit','navpayment','navaddress','navsummary','navsuccess')" action="javascript:void(0)">
                    <div class=selectaddress>
                        <div class=paymentdiv>
                            <label for="address1">
                                <h2 class=custname>Sanika Kulkarni</h2>
                                <p class=addresscontent>Models Millenium Vistas Caranzalem, Panjim Goa</p>
                                <p class=addresscontact>9921950055</p>
                            </label><br>
                        </div>
                    </div>
                    <div class=selectaddress>
                        <div class=paymentdiv>
                            <label for="address2">
                                <h2 class=custname>Sanika Kulkarni</h2>
                                <p class=addresscontent>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque sunt id, saepe dignissimos impedit dicta consectetur veniam quam, unde libero consequatur numquam iure recusandae repellendus! Consequatur labore fugiat libero voluptates.</p>
                                <p class=addresscontact>9921950055</p>
                            </label><br>
                        </div>
                    </div>
                    <div class=selectaddress>
                        <div class=paymentdiv>
                            <label for="address3">
                                <h2 class=custname>Sanika Kulkarni</h2>
                                <p class=addresscontent>Models Millenium Vistas Caranzalem, Panjim Goa Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <p class=addresscontact>9921950055</p>
                            </label>
                        </div>    
                    </div>
                    <div class=nextdiv>
                        <center><button class=next-btn>Next</button></center>
                    </div>    
                </form>  
            </div>   
    </div>
     <!--Contents End-->  
</body>
</html>