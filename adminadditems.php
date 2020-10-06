<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="Images/logo.png">
    <link rel="stylesheet" href="admincss.css">
    <link rel="stylesheet" type="text/css" href="maincss.css">
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
                <td class=logotexttd>Cakes and Bakes</td>
                <td class=searchtd>
                    <div class=searchdiv>
                        <form action="">
                            <input class="searchinput" type="search" placeholder="Search for baked goodies">
                            <button class="searchicon"><i class="fas fa-search"></i></button>
                        </form>   
                    </div>
                </td>
                <td class=headerlinks onmouseenter=menushow() onmouseleave=menuhide()>Add</td>
                <td class="headerlinks popupmodal" onmouseenter=profileshow() onmouseleave=profilehide()>Modify</td>
                <td class=headerlinks>Season Specials</td>
                <td class=headerlinks>Order Status</td>
            </tr>
        </table>       
    </div>
    <!--Header end-->

    <!--Content start-->
    <div class='additemsback'>
        <center>
            <form class=additemsform action="">
                <table cellpadding=15px;>
                    <tr>
                        <td colspan=2 class='additemheading'>
                            <center>Add Item Details</center>
                        </td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="category">Category</label></td>
                        <td><select name="category" id="">
                            <option value="cakes">Cakes</option>
                            <option value="ocassion cakes">Ocassion Cakes</option>
                            <option value="cupcakes">Cupcakes</option>
                            <option value="cookies">Cookies</option>
                            <option value="macaroons">Macaroons</option>
                            <option value="snacks">Snacks</option>
                            <option value="brownies">Brownies</option>
                            <option value="delights">Delights</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="name">Name of Item</label></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="price">Price</label></td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="description">Description</label></td>
                        <td id='desc'><input type="text"><span onclick=adddesc()>+</span><br></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="availability">Availability</label></td>
                        <td>
                            <select name="availability" id="">
                                <option value="accepting">Accepting Orders</option>
                                <option value="not accepting">Currently Not Accepting Orders</option>
                            </select>
                    </td>
                    </tr>
                </table>
                <div class="image-input">
                    <div class="addimgdiv">
                        <input id="uploadImage" type="file" accept="image/*" onchange="PreviewImage();" multiple />
                        <label id=uploadimglabel for="uploadImage"><i class="fas fa-camera"></i> &nbsp; <br>Add a Image</label>
                    </div>
                    <div class="previews"><img id="uploadPreview" style="width: 100px; height: 100px; display:none;" ></div>
                </div>
                <button class=add-item-btn type=submit>Add Item</button>
            </form>    
        </center>  
    </div>
    <!--Content end-->
</body>
</html>