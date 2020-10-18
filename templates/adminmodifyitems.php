<?php
    session_start();
?>
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
    <title>Cakes and Bakes | Modify Item</title>
</head>
<body>
    <?php
        require "headeradmin.php";
        require "../includes/dbhinc.php";
        $name = $_GET['itemname'];
        $sql="SELECT * FROM item where name=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ./homepage.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $itemid = $row['itemid'];
                $name=$row['name'];
                $category = $row['category'];
                $qp = $row['quantityprice'];
                $description = $row['description'];
                $availability = $row['availability'];
                $rating = $row['rating'];
                $star = $row['star'];
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    ?>
    <!--Content start-->
    <div class='additemsback'>
        <center>
            <form class=additemsform action="../includes/modifyitemsinc.php?itemid=<?php echo $itemid; ?>" method="POST">
                <table cellpadding=15px;>
                    <tr>
                        <td colspan=2 class='additemheading'>
                            <center>Modify Item Details</center>
                        </td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="category">Category</label></td>
                        <td><select name="category" required>
                            <option value="cakes" <?php ($category == 'cakes')? "selected" : "" ?>>Cakes</option>
                            <option value="ocassion cakes" <?php echo ($category == 'ocassion cakes')? "selected" : "" ?>>Ocassion Cakes</option>
                            <option value="cupcakes" <?php echo ($category == 'cupcakes')? "selected" : "" ?>>Cupcakes</option>
                            <option value="cookies" <?php echo ($category == 'cookies')? "selected" : "" ?>>Cookies</option>
                            <option value="macaroons" <?php echo ($category == 'macaroons')? "selected" : "" ?>>Macaroons</option>
                            <option value="snacks" <?php echo ($category == 'snacks')? "selected" : "" ?>>Snacks</option>
                            <option value="brownies" <?php echo ($category == 'brownies')? "selected" : "" ?>>Brownies</option>
                            <option value="delights" <?php echo ($category == 'delights')? "selected" : "" ?>>Delights</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="name">Name of Item</label></td>
                        <td><input type="text" name="name" required value="<?php echo $name ?>"></td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="quantityprice">Quantity and Price</label></td>
                        <td>
                            <textarea name="quantityprice" cols="32" rows="5" placeholder="Enter a quantity and price separated by colon" required>
                            <?php echo $qp ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="description">Description</label></td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="Enter each description on a newline" required><?php echo $description ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label class='additemlabel' for="availability">Availability</label></td>
                        <td>
                            <select name="availability" required>
                                <?php if($availability=="Accepting"): ?>
                                    <option value="Accepting" selected>Accepting Orders</option>
                                    <option value="Not Accepting">Currently Not Accepting Orders</option>
                                <?php else: ?>
                                    <option value="Accepting">Accepting Orders</option>
                                    <option value="Not Accepting" selected>Currently Not Accepting Orders</option>
                                <?php endif; ?>
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
                <button class=add-item-btn name="modify" type=submit>Save</button>
            </form>    
        </center>  
    </div>
    <!--Content end-->
</body>
</html>