<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes and Bakes | Profile</title>
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="maincss.css">
    <link rel="stylesheet" type="text/css" href="profilecss.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Great+Vibes&family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
    
    <script src="mainjs.js"></script>

    <style>
        .profileinput{
            margin:1%;
            margin-top:4%;
        }
    </style>
</head>
<body>
    <?php
        require "header.php"
    ?>

    <div class=popupaddressdiv id=popupaddress>
        <div class="addressbox">
            <form method="POST" action="../includes/addressadd.php">
                <h1 class="heading">Address</h1><span class="cross" onclick="popupaddressclose()">X</span>
                <div class="inline-data">
                    <input class=profileinput type="text" placeholder="Name" id="email" name="email" required >
                    <input class=profileinput type="number" placeholder="Contact Number" id="password" name="pwd" required>
                </div><br>
                <textarea name="address" id="address" cols="60" rows="5"  placeholder="Add address "></textarea>
                <br>
                <button  type="submit" class=save-btn name="save-btn">Add address</button>
            </form> 
        </div>
    </div> 

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
        <div class="address-block">
            <div class=addressback id=backaddress>
                <form action="javascript:void(0)">
                    <div class=addressheader>
                        <span id=addresshead>Address Book</span>
                        <button class=add-btn onclick="popupAddress()">+</button>
                    </div>  
                    <hr>
                    <div class="alladdress">
                        <div class=selectaddress>
                            <div class=paymentdiv>
                                <label for="address1">
                                    <div class="inline-data">
                                        <h2 class=custname>Sanika Kulkarni</h2>
                                        <p class=addresscontact>9921950055</p>
                                    </div>
                                    <p class=addresscontent>Models Millenium Vistas Caranzalem, Panjim Goa</p>
                                </label><br>
                            </div>
                        </div>
                        
                    </div>
                </form>  
            </div>   
    </div>
     <!--Contents End-->  
</body>
</html>