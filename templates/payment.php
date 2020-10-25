<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="maincss.css">
    <link rel="stylesheet" href="ordercss.css">
     <!-- font -->
     <script src="https://kit.fontawesome.com/a77f5500d1.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kufam&family=Roboto&display=swap" rel="stylesheet">
     <!-- Javascript -->
    <script src="mainjs.js"></script>
        <script>
            function displaycontent(blockid1,blockid2,blockid3,blockid4,navid1,navid2,navid3,select)
            {
                if(document.querySelector("input[name='"+select+"']:checked")!==null)
                {
                    document.getElementById(navid1).style.borderBottom="3px solid rgb(235, 105, 127)";
                    document.getElementById(navid2).style.borderBottom="none";
                    document.getElementById(navid3).style.borderBottom="none";
                    document.getElementById(blockid1).style.display="block";
                    document.getElementById(blockid2).style.display="none";
                    document.getElementById(blockid3).style.display="none";
                    document.getElementById(blockid4).style.display="none";
                } 
                else{
                    alert('Please enter all the fields');
                }
            }

            function displaycredits(blockid1,blockid2,blockid3,blockid4,navid1,navid2,navid3)
            {
                var p = document.querySelector('input[name="Payment"]:checked');
                if(p!==null){
                    p=p.value;
                    if(p=="Credit Card"|| p=="Debit Card")
                    {
                        console.log(p);
                        document.getElementById('backcredit').style.display="block";
                        document.getElementById('backpayment').style.display="none";
                        document.getElementById('backaddress').style.display="none";
                        document.getElementById('backsummary').style.display="none";
                        document.getElementById('backsuccess').style.display="none";
                    }
                    else{
                        var payment="Payment";
                        displaycontent(blockid1,blockid2,blockid3,blockid4,navid1,navid2,navid3,payment);
                    } 
                }
                else{
                    alert('Please enter all the fields');
                }
                
                
            }
            function goback(blockid1,blockid2,blockid3,blockid4,navid1,navid2,navid3)
            {
                document.getElementById(navid1).style.borderBottom="3px solid rgb(235, 105, 127)";
                document.getElementById(navid2).style.borderBottom="none";
                document.getElementById(navid3).style.borderBottom="none";
                document.getElementById(blockid1).style.display="block";
                document.getElementById(blockid2).style.display="none";
                document.getElementById(blockid3).style.display="none";
                document.getElementById(blockid4).style.display="none";
            }

            function displaycontent2(blockid1,blockid2,blockid3,blockid4,navid1,navid2,navid3,select1,select2,select3,select4,select5)
            {
                if((document.querySelector("input[name='"+select1+"']").value!="") 
                && (document.querySelector("input[name='"+select2+"']").value!="") 
                && (document.querySelector("input[name='"+select3+"']").value!="") 
                && (document.getElementById(select4).value!="") 
                && (document.getElementById(select5).value!=""))
                {
                    document.getElementById(navid1).style.borderBottom="3px solid rgb(235, 105, 127)";
                    document.getElementById(navid2).style.borderBottom="none";
                    document.getElementById(navid3).style.borderBottom="none";
                    document.getElementById(blockid1).style.display="block";
                    document.getElementById(blockid2).style.display="none";
                    document.getElementById(blockid3).style.display="none";
                    document.getElementById(blockid4).style.display="none";
                }
                else{
                    alert('Please enter all the fields');
                }
            }
    </script>
    <title>Cakes and Bakes | Payment</title>
</head>
<body>
    <div class="paymentpageback">
        <div class=paymentmainnav>
            <div class=addressnav id=navaddress>
                Select an Address
            </div>
            <div class=paymentnav id=navpayment>
                Payment 
            </div>
            <div class=ordersummarynav id=navsummary>
                Order Summary
            </div>
        </div>
        
        <div class="paymentcontent">
            <form action="paymentinc.php" method="POST">
                <div class=addressback id=backaddress>
                    <center><h1 class=addressheading>Select an Address</h1></center><hr>
                        <?php
                            require "../includes/dbhinc.php";
                            if(isset($_GET['proceedtopay']) && isset($_SESSION['email']) )
                            {
                                if($_SESSION['email']!='admin@gmail.com')
                                {
                                    $sql="SELECT * FROM recipientdetails where userid=?";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt,$sql))
                                    {
                                        header("Location: ./homepage.php?error=sqlerror");
                                        exit();
                                    }
                                    else
                                    {
                                        mysqli_stmt_bind_param($stmt,"s",$_SESSION['userid']);
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $name=$row['fullname'];
                                            $contactnumber=$row['contactnumber'];
                                            $address=$row['address'];
                                            $recipientid=$row['recipientid'];
                                            echo "<div class=selectaddress>
                                                    <div class=radioaddressdiv><center><input type='radio' id='$recipientid' value='$recipientid' name='address'></center></div>
                                                        <div class=paymentdiv>
                                                            <label for='$recipientid'>
                                                                <h2 class=custname>$name</h2>
                                                                <p class=addresscontent>$address</p>
                                                                <p class=addresscontact>$contactnumber</p>
                                                            </label><br>
                                                        </div>
                                                    </div>";
                                        }
                                    }
                                }
                                else if($_SESSION['email']=='admin@gmail.com')
                                {
                                    $_SESSION['error-message'] = "Admin cannot access this page";
                                    header("Location:../templates/homepage.php?error=Admin cannot access this page");
                                    exit();
                                }
                            }
                            else if(!(isset($_SESSION['email'])))
                            {
                                $_SESSION['error-message'] = "Login ";
                                header("Location:../templates/homepage.php?error=Login First");
                                exit();
                            }
                        ?>
                        <div class=nextdiv>
                            <center><span class=next-btn onclick="displaycontent('backpayment','backaddress','backsummary','backcredit','navpayment','navaddress','navsummary','address')">Next</span></center>
                        </div>    
                </div>

                <div class=paymentback id=backpayment>
                    <center><h1 class=addressheading>Select a Payment Method</h1></center>
                        <div class=selectpayment>
                            <div class=radiopaymentdiv><center><input type="radio" id="cod" name="Payment" value="Cash on Delivery" ></center></div>
                            <div class=paymentdiv2>
                                <label for="cod">
                                    Cash On Delivery
                                </label><br>
                            </div>
                        </div>
                        <div class=selectpayment>
                            <div class=radiopaymentdiv><center><input type="radio" id="creditcard" name="Payment" value="Credit Card" ></center></div>
                            <div class=paymentdiv2>
                                <label for="creditcard">
                                    Credit Card
                                </label><br>
                            </div>
                        </div>
                        <div class=selectpayment>
                            <div class=radiopaymentdiv><center><input type="radio" id="debitcard" name="Payment" value="Debit Card" ></center></div>
                            <div class=paymentdiv2>
                                <label for="debitcard">
                                    Debit Card
                                </label>
                            </div>    
                        </div>
                        <div class=nextdiv>
                            <center>
                                <span class=back-btn onclick="goback('backaddress','backsummary','backpayment','backcredit','navaddress','navsummary','navpayment');">Back</span>

                                <span class=next-btn onclick="displaycredits('backsummary','backaddress','backpayment','backcredit','navsummary','navaddress','navpayment')">Next</span>
                            </center>
                        </div>   
                </div>
                
                <div class="carddetailsback" id=backcredit>
                        <h1 class=carddetailsheading >Enter Card Details</h1>
                        <input class=textcarddetails type="text" placeholder="Name on card" name=name>
                        <input class=textcarddetails type="text" placeholder="Card Number" name=cardno>
                        <label class=textcarddetails>Expiry Date</label> 
                        <select class=selectexpiry name=month id=month>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <select class=selectexpiry name=year id=year >
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                        </select>
                        <input class=textcarddetails type="text" placeholder="CVV" name="cvv">
                        <center>
                            <span class=back-btn onclick="goback('backpayment','backcredit','backaddress','backsummary','navpayment','navaddress','navsummary');cleardata();">Back</span>
                            <span onclick="displaycontent2('backsummary','backaddress','backpayment','backcredit','navsummary','navaddress','navpayment','cvv','name','cardno','year','month')" class="next-btn">Proceed</span>
                        </center>  
                </div>

                <div class="ordersummaryback" id=backsummary>
                        <center>
                            <h1 class=carddetailsheading >Order Summary</h1>
                            <table class=ordersummary cellpadding=15px  cellspacing=0>
                                <tr class=summary-thead>
                                    <td>Item</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                </tr>
                                <?php
                                        $sql="SELECT i.name,quantity,price FROM cart c JOIN item i ON c.itemid=i.itemid where userid=?";
                                        $stmt = mysqli_stmt_init($conn);
                                        if(!mysqli_stmt_prepare($stmt,$sql))
                                        {
                                            header("Location: ./homepage.php?error=sqlerror");
                                            exit();
                                        }
                                        else
                                        {
                                            mysqli_stmt_bind_param($stmt,"s",$_SESSION['userid']);
                                            mysqli_stmt_execute($stmt);
                                            $totalprice=0;
                                            $result = mysqli_stmt_get_result($stmt);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $itemname=$row['name'];
                                                $quantity=$row['quantity'];
                                                $price=$row['price'];
                                                $totalprice=$totalprice+$price;
                                                echo"
                                                <tr class='orderdesc'>
                                                    <td><span class='ordername'>$itemname </span></td>
                                                    <td><span class='quantity'>$quantity</span></td>
                                                    <td><span class='cost'>₹ $price</span></td>
                                                </tr>";
                                                        
                                            }
                                        }
                                        $todaydate=date("Y-m-d",strtotime("+1 day"));
                                        $maxdate=date("Y-m-d",strtotime("+8 day"));
                                        echo "
                                        </table>
                                        <div class='inline-summary'>
                                            <div class=datediv>
                                                <h3 class=dateheading>Delivery Date</h3><input type='date' min=$todaydate max=$maxdate name='date' class='datebox' required>
                                            </div>
                                            <p class='totalcost'>Total:₹ $totalprice</p>
                                        </div>
                                        ";
                                ?>    
                            
                            <span class=back-btn onclick="goback('backpayment','backaddress','backsummary','backcredit','navpayment','navaddress','navsummary')">Back</span>
                            <input type="submit" value="Confirm Order" class="next-btn" name=orderconfirm-btn>
                        </center>
                    </form>
                </div>
            <script>
                setTimeout(() => {
                    let msg = document.querySelector(".msg-outerbox");
                    msg.remove();
                }, 2000);
            </script>
        <!-- MESSAGE -->
        <?php if(isset($_SESSION['error-message'])): ?>
            <div class='msg-outerbox'>
                <center><div class='msg-container danger'>
                    <i class="fas fa-times-circle"></i>
                    <?php 
                        echo $_SESSION['error-message'];
                        unset($_SESSION['error-message']);
                    ?>
                </div></center>
            </div>
            <?php elseif(isset($_SESSION['success-message'])): ?>
                <div class='msg-outerbox'>
                    <center><div class='msg-container success'>
                        <i class="fas fa-check-circle"></i>
                        <?php 
                            echo $_SESSION['success-message'];
                            unset($_SESSION['success-message']);
                        ?>   
                    </div></center>
                </div> 
            <?php endif; ?>
    <!-- MESSAGE END -->    
</body>
</html>