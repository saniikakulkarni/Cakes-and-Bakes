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
    <style>
    body{
        background:white;
    }
    </style>

    <script>
         function changePrice(n){
            document.getElementById('pricedisplay').innerHTML = `${n}`;
        }
    </script>

</head>
<body>
    <?php
        if(isset($_SESSION['email']))
        {
            if($_SESSION['email']=='admin@gmail.com')
            require "headeradmin.php";
            else
            require "header.php";
        }
        else
        require "header.php";
        require "../includes/dbhinc.php";
        $name=$_GET['itemname'];
    ?>
    <!--Contents start-->
    <div class=itemcontents>
        <div class="itempicdesc">
                <?php
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
                        $img1=$row['img1'];
                        $img2=$row['img2'];
                        $img3=$row['img3'];
                        $img4=$row['img4'];
                        $itemid = $row['itemid'];
                        $name=$row['name'];
                        $quantityprice=$row['quantityprice'];
                        $description=$row['description'];
                        $availability=$row['availability'];
                        $qp=explode("\n",$quantityprice);
                        $qplen=sizeof($qp);
                        $price=[];
                        $quantity=[];
                        for($j=0;$j<$qplen;$j++)
                        {
                            list($quantity[$j],$price[$j])=explode(":",$qp[$j]);
                            $quantity[$j]=trim($quantity[$j]);
                            $price[$j]=trim($price[$j]);
                        }
                        $n=sizeof($qp);
                        $rating=$row['rating'];
                        $star=3;
                        $todaydate=date("Y-m-d",strtotime("+1 day"));
                        $maxdate=date("Y-m-d",strtotime("+8 day"));
                    ?>
                    <div class='itempic'>
                        <div class='smallpicdiv'>
                            <img  src="<?php echo "./itemimages/".$img1; ?>" onmouseenter='picboxdisplay("smallpicid1","smallpicid2","smallpicid3","smallpicid4")' id=smallpicid1 class=smallpic>
                            <img  src="<?php echo "./itemimages/".$img2; ?>" onmouseenter='picboxdisplay("smallpicid2","smallpicid1","smallpicid3","smallpicid4")' id=smallpicid2 class=smallpic>
                            <img  src="<?php echo "./itemimages/".$img3; ?>" onmouseenter='picboxdisplay("smallpicid3","smallpicid2","smallpicid1","smallpicid4")' id=smallpicid3 class=smallpic>
                            <img  src="<?php echo "./itemimages/".$img4; ?>" onmouseenter='picboxdisplay("smallpicid4","smallpicid2","smallpicid3","smallpicid1")' id=smallpicid4 class=smallpic>
                        </div>
                    <div id=bigpicdiv style='background:url("<?php echo "./itemimages/".$img1; ?>")'>
                    </div>
                </div>
                    
                        <div class='itemdesc'>
                            <div class='itemdescstart'>
                            <div class='inline-data'>
                        <?php
                            echo "<h1 class=item-name>$name</h1>";
                            if(isset($_SESSION['email']))
                            {
                                if($_SESSION['email']=='admin@gmail.com')
                                {
                                    echo"<a href='adminmodifyitems.php?itemname=$name' class=editicon><i class='fas fa-edit'></i></a>";
                                }
                            }
                            
                        echo "</div>
                            
                            <p class='rating'>";
                                for($i=1;$i<=$star;$i++)
                                {
                                    echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                }
                                for($i=1;$i<=5-$star;$i++)
                                {
                                    echo "<i class='fa fa-star star-null'  aria-hidden='true'></i>";
                                }
                                echo "$rating
                            </p>
                            <form class=orderform method='POST' action='addtocart.php?itemid=$itemid'>";
                            if($availability=='Accepting')
                            {
                                echo "<h3 class=upgradeheading>Select an Upgrade</h3>
                                <select name=upgrade id=upgrade>";
                                    for($j=0;$j<$qplen;$j++)
                                    {
                                        echo "<option>$quantity[$j] : $price[$j]</option>";
                                    }
                                 echo "   
                                </select>";
                            }
                                
                        }
                    }
                               echo "<div class=pindate>
                                    <div class=pincodediv>
                                        <h3 class=pincodeheading>Orders</h3>";
                                        if($availability=='Accepting')
                                        {
                                           echo " <p class=pincodeinput style='color:green'>$availability</p>";
                                        }
                                        else
                                        {
                                            echo " <p class=pincodeinput style='color:red'>$availability</p>";
                                        }
                                        echo "
                                    </div>
                                    <div class=datediv>";
                                        if($availability=='Accepting')
                                        {
                                            echo "<h3 class=dateheading>Delivery Date</h3><input  type='date' min=$todaydate max=$maxdate name='date'>";
                                        }
                                        echo"
                                    </div>
                                </div>";
                                if($availability=='Accepting')
                                {
                                    echo "<button class='addtocart-btn' name='addtocart-btn'><i class='fas fa-shopping-cart'></i>Add to Cart</button>
                                    <button class='ordernow-btn' name='ordernow-btn'><i class='fas fa-bolt'></i>Order Now</button>";
                                }
                                echo "
                            </form>
                            <hr>
                        </div>
                        <div class='itemdescend'>
                            <h2 class=descheading>Description</h2>
                            <ul class=desclist>";
                                $descrows=explode("\n",$description);
                                $desclen=sizeof($descrows);
                                for($i=0;$i<$desclen;$i++)
                                {
                                    echo "<li class=descitems><i class='fas fa-check-circle'></i>$descrows[$i]</li>";
                                }
                    ?> 
                            </ul>
                        </div>
                        
                    </div>  
                </div>
                <div class="reviews">
                    <div class="reviewsback">
                        <center><h1 class=reviewsheading>Top Ratings and Reviews</h1></center>
                        <div class="review-container">
                            <div class=reviewstile>
                                <p class=reviewname>Sanika Kulkarni</p>
                                <p class=reviewcontent>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam accusantium magnam, ut commodi nemo totam voluptatibus aut debitis ipsam excepturi. </p>
                            </div>
                            <div class=reviewstile>
                                <p class=reviewname>Sanika Kulkarni</p>
                                <p class=reviewcontent>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam accusantium magnam, ut commodi nemo totam voluptatibus aut debitis ipsam excepturi. </p>
                            </div> 
                            <div class=reviewstile>
                                <p class=reviewname>Sanika Kulkarni</p>
                                <p class=reviewcontent>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam accusantium magnam, ut commodi nemo totam voluptatibus aut debitis ipsam excepturi. </p>
                            </div>
                            <p style="float:right"><a href=reviews.php>See all reviews</a></p>                   
                        </div>
                    </div>
                    <div><center><button class='addreview-btn' onclick=reviewpopup()>Give a Review</button></center></div>
                </div>
            
        <div class="alsolike">
            <center><h1 class=alsolikeheading>You May Also Like</h1></center>
            <div class=alsolikeback>
                <div class=alsoliketile></div>
            </div>
        </div>
        
        <div class=popupreviewdiv id=popupreview>
            <div class="reviewbox">
                <form autocomplete="off" method="POST" action="../includes/addreviewinc.php">

                    <h1 class="heading">Review</h1><span class="cross" onclick="popupreviewclose()">X</span>
                    <textarea name="review" id="review" class=text-review  placeholder="Add Review"></textarea>
                    <br>
                    <button  type="submit" class=save-btn name="save-review">Add Review</button>
                </form> 
            </div>
        </div> 
    </div> 
</body>
</html>