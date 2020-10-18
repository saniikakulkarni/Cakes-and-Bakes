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
    <?php
        require "headeradmin.php";
    ?>
    <!--Content start-->
    <div class='additemsback'>
        <center>
            <form class=additemsform action="../includes/additemsinc.php" method="POST">
                <table cellpadding=15px;>
                    <tr>
                        <td colspan=2 class='additemheading'>
                            <center>Add Item Details</center>
                        </td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="category">Category</label></td>
                        <td><select name="category"id="" required>
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
                        <td><input type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="quantityprice">Quantity and Price</label></td>
                        <td><textarea name="quantityprice" cols="32" rows="5" placeholder="Enter a quantity and price separated by colon" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="description">Description</label></td>
                        <td><textarea name="description" cols="30" rows="5" placeholder="Enter each description on a newline" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="availability">Availability</label></td>
                        <td>
                            <select name="availability" required>
                                <option value="accepting">Accepting Orders</option>
                                <option value="not accepting">Currently Not Accepting Orders</option>
                            </select>
                        </td>
                    </tr>
                </table>
               <!--<div class="image-input">
                    <div class="addimgdiv">
                        <input id="uploadImage" type="file" accept="image/*" onchange="PreviewImage();" multiple />
                        <label id=uploadimglabel for="uploadImage"><i class="fas fa-camera"></i> &nbsp; <br>Add a Image</label>
                    </div>
                    <div class="previews"><img id="uploadPreview" style="width: 100px; height: 100px; display:none;" ></div>
                </div>-->
                <button class=add-item-btn name="additem-btn" type=submit>Add Item</button>
            </form>    
        </center>  
    </div>
    <!--Content end-->
</body>
</html>