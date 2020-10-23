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
                    <div class=selectaddress>
                        <div class=radioaddressdiv><center><input type="radio" id="address1" name="address" value="" required></center></div>
                        <div class=paymentdiv>
                            <label for="address1">
                                <h2 class=custname>Sanika Kulkarni</h2>
                                <p class=addresscontent>Models Millenium Vistas Caranzalem, Panjim Goa</p>
                                <p class=addresscontact>9921950055</p>
                            </label><br>
                        </div>
                    </div>
                    <div class=selectaddress>
                        <div class=radioaddressdiv><center><input type="radio" id="address2" name="address" value="" required></center></div>
                        <div class=paymentdiv>
                            <label for="address2">
                                <h2 class=custname>Sanika Kulkarni</h2>
                                <p class=addresscontent>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque sunt id, saepe dignissimos impedit dicta consectetur veniam quam, unde libero consequatur numquam iure recusandae repellendus! Consequatur labore fugiat libero voluptates.</p>
                                <p class=addresscontact>9921950055</p>
                            </label><br>
                        </div>
                    </div>
                    <div class=selectaddress>
                        <div class=radioaddressdiv><center><input type="radio" id="address3" name="address" value="" required></center></div>
                        <div class=paymentdiv>
                            <label for="address3">
                                <h2 class=custname>Sanika Kulkarni</h2>
                                <p class=addresscontent>Models Millenium Vistas Caranzalem, Panjim Goa Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <p class=addresscontact>9921950055</p>
                            </label>
                        </div>    
                    </div>
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
                        <button class=back-btn onclick="goback('backpayment','backaddress','backsummary','backsuccess','backcredit','navpayment','navaddress','navsummary','navsuccess')">Back</button>

                        <input type="submit" value="Confirm Order" class="next-btn"  onclick="confirmDetails()" action="javascript:void(0)"
                        >
                    </center>
                </form>

            </div>
            <div class="ordersuccessback" id=backsuccess>
                <h2 style="color:rgba(41, 156, 66, 0.747)">Your Order Placed Successfully!!!</h2>
            </div>
        </div>
    </div>
</body>
</html>