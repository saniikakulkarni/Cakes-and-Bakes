<?php
    session_start();
    if(isset($_SESSION['userid'])){
        require "../includes/dbhinc.php";
        $userid = $_SESSION['userid'];
    }
?>
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

        require "header.php";

        $sql="SELECT * FROM userdetails where userid=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ./homepage.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$userid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $name = $row['fullname'];
                $email = $row['email'];
            }
        }

    ?>
    <div class=popupaddressdiv id=popupaddress>
        <div class="addressbox">
            <form method="POST" action="../includes/addressaddinc.php">
                <h1 class="heading">Address</h1><span class="cross" onclick="popupaddressclose()">X</span>
                <div class="inline-data">
                    <input class=profileinput type="text" placeholder="Customer Name" id="custname" name="custname" required >
                    <input class=profileinput type="number" placeholder="Contact Number" id="contactnum" name="contactnum" required>
                </div><br>
                <textarea name="address" id="address" cols="60" rows="5"  placeholder="Add address "></textarea>
                <br>
                <button  type="submit" class=save-btn name="save-address">Add address</button>
            </form> 
        </div>
    </div> 

    <!--Contents start-->
    <div class=profilecontents>
        <div class=profileedit>
            <center><p class=profileheading>*These can not be left empty</p><br></center>
            <form action="../includes/editprofileinc.php" method="POST">
                <label class="profilelabel">Full Name*</label><br><br>
                <input class="profileinput" type="text" placeholder="Full Name" required value="<?php echo $name; ?>" name="fullname"><br><br>
                <label class="profilelabel" >Email-id (cannot be changed)</label><br><br>
                <input class="profileinput" type="email" value="<?php echo $email; ?>" disabled  placeholder="Email-Id" required><br><br>
                <button class="profileedit-btn" name="edit-profile">Save</button>
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
                    <?php

                        $sql="SELECT * FROM recipientdetails where userid=?";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql))
                        {
                            header("Location: ./homepage.php?error=sqlerror");
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt,"s",$userid);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            while($row = mysqli_fetch_assoc($result)){
                                $custname = $row['fullname'];
                                $cn = $row['contactnumber'];
                                $address = $row['address'];
                                echo "
                                        <div class=selectaddress>
                                                <div class=paymentdiv>
                                                    <label for='address1'>
                                                        <div class='inline-data'>
                                                            <h2 class=custname>$custname</h2>
                                                            <p class=addresscontact>$cn</p>
                                                        </div>
                                                        <p class=addresscontent>$address</p>
                                                    </label><br>
                                                </div>
                                            </div>
                                    ";
                            }
                        }
                    ?>
                        
                    </div>
                </form>  
            </div>   
    </div>
     <!--Contents End-->  
</body>
</html>





