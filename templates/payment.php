<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="cartcss.css">
    <link rel="stylesheet" href="ordercss.css">
     <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kufam&family=Roboto&display=swap" rel="stylesheet">
     <!-- Javascript -->
    <script src="mainjs.js"></script>
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
            <div class=ordersuccessnav id=navsuccess>
                Order Success
            </div>
        </div>
        
        <div class="paymentcontent">
            <div class=addressback id=backaddress>
                <center><h1 class=addressheading>Select an Address</h1></center><hr>
                <form onsubmit="displaycontent('backpayment','backaddress','backsummary','backsuccess','backcredit','navpayment','navaddress','navsummary','navsuccess')" action="javascript:void(0)">
                    <?php
                        session_start();
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
                                                <div class=radioaddressdiv><center><input type='radio' id='$recipientid' name='address'required></center></div>
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
                            $_SESSION['error-message'] = "Login Required";
                            header("Location:../templates/homepage.php?error=Login First");
                            exit();
                        }
                    ?>
                    <div class=nextdiv>
                        <center><button class=next-btn type="submit">Next</button></center>
                    </div>    
                </form>  
            </div>

            <div class=paymentback id=backpayment>
                <center><h1 class=addressheading>Select a Payment Method</h1></center>
                <form action="javascript:void(0)">
                    <div class=selectpayment>
                        <div class=radiopaymentdiv><center><input type="radio" id="cod" name="Payment" value="Cash on Delivery" required></center></div>
                        <div class=paymentdiv2>
                            <label for="cod">
                                Cash On Delivery
                            </label><br>
                        </div>
                    </div>
                    <div class=selectpayment>
                        <div class=radiopaymentdiv><center><input type="radio" id="creditcard" name="Payment" value="Credit Card" required></center></div>
                        <div class=paymentdiv2>
                            <label for="creditcard">
                                Credit Card
                            </label><br>
                        </div>
                    </div>
                    <div class=selectpayment>
                        <div class=radiopaymentdiv><center><input type="radio" id="debitcard" name="Payment" value="Debit Card" required></center></div>
                        <div class=paymentdiv2>
                            <label for="debitcard">
                                Debit Card
                            </label>
                        </div>    
                    </div>
                    <div class=nextdiv>
                        <center>
                            <button class=back-btn onclick="goback('backaddress','backsummary','backsuccess','backpayment','backcredit','navaddress','navsummary','navsuccess','navpayment');">Back</button>

                            <input type="submit" value="Next" class=next-btn onclick="displaycredits('backsummary','backaddress','backsuccess','backpayment','backcredit','navsummary','navaddress','navsuccess','navpayment')" action="javascript:void(0)">
                        </center>
                    </div>   
                </form>  
            </div>
            
            <div class="carddetailsback" id=backcredit>
                <form id="creditform" onsubmit="displaycontent('backsummary','backaddress','backsuccess','backpayment','backcredit','navsummary','navaddress','navsuccess','navpayment')" action="javascript:void(0)">
                    <h1 class=carddetailsheading >Enter Card Details</h1>
                    <input class=textcarddetails type="text" placeholder="Name on card" required>
                    <input class=textcarddetails type="text" placeholder="Card Number" required>
                    <label class=textcarddetails for="">Expiry Date</label> 
                    <select class=selectexpiry name=month id=month required>
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
                    <select class=selectexpiry name=year id=year required>
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
                    <input class=textcarddetails type="text" placeholder="CVV" required>
                    <center>
                        <input type="button" value="Back" class=back-btn onclick="goback('backpayment','backcredit','backaddress','backsummary','backsuccess','navpayment','navaddress','navsummary','navsuccess');cleardata();">
                        <input type="submit" value="Proceed" class="next-btn" >
                    </center>
                </form>   
            </div>

            <div class="ordersummaryback" id=backsummary>
                <form  action="javascript:void(0)">
                    <center>
                        <h1 class=carddetailsheading >Order Summary</h1>
                        <table class=ordersummary cellspacing=40px>
                            <tr>
                                <td>Item</td>
                                <td>Price</td>
                                <td>Quantity</td>
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
                                            <tr>
                                            <div class='orderdesc'>
                                                <td><span class='ordername'>$itemname </span></td>
                                                <td><span class='cost'>₹ $price</span></td>
                                                <td><span class='quantity'>$quantity</span><td>
                                        </div>
                                            </tr>";
                                                    
                                        }
                                    }
                                    echo"
                                    </table>
                                    <p class='cost'>Total:₹ $totalprice</p>";      
                            ?>
                        
                        <button class=back-btn onclick="goback('backpayment','backaddress','backsummary','backsuccess','backcredit','navpayment','navaddress','navsummary','navsuccess')">Back</button>
                                <input type="submit" value="Confirm Order" class="next-btn"  onclick="confirmDetails()" action="">
                    </center>
                </form>

            </div>
            <div class="ordersuccessback" id=backsuccess>
                <center>
                    <h1 class=carddetailsheading >Order Placed</h1>
                    <table class=ordersummary cellspacing=40px>
                            <tr>
                                <td>Item</td>
                                <td>Price</td>
                                <td>Quantity</td>
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
                                    $result = mysqli_stmt_get_result($stmt);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $itemname=$row['name'];
                                        $quantity=$row['quantity'];
                                        $price=$row['price'];
                                        echo"
                                                <tr>
                                                <div class='orderdesc'>
                                                    <td><span class='ordername'>$itemname </span></td>
                                                    <td><span class='cost'>₹ $price</span></td>
                                                    <td><span class='quantity'>$quantity</span><td>
                                            </div>
                                                </tr>";
                                    }
                                }
                            ?>
                    </table>
                    <h2 style="color:rgba(41, 156, 66, 0.747)">Order placed successfully!</h2>
                    <button class=next-btn><a href="homepage.php">Continue Shopping</a></button>
                </center>
            </div>
        </div>
    </div>
</body>
</html>