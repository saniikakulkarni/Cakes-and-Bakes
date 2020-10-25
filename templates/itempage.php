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
                        $category = $row['category'];
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
                        $star=$row['star'];
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
                                           echo "  <i class='fas fa-check' style='color:green;'></i>
                                                    <span class=pincodeinput style='color:green;font-size:20px'>$availability</span>";
                                        }
                                        else
                                        {
                                            echo " <i class='fas fa-times-circle'></i>
                                                    <span class=pincodeinput style='color:red;font-size:20px'>$availability</span>";
                                        }
                                        echo "
                                    </div>
                                </div>";
                                if($availability=='Accepting')
                                {
                                    echo "<button class='addtocart-btn' name='addtocart-btn'><i class='fas fa-shopping-cart'></i>Add to Cart</button>";
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
                            <?php
            
                                $sql="SELECT * FROM review where itemid=?";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt,$sql))
                                {
                                    $_SESSION['error-message'] = 'Error!';
                                    header("Location: itempage.php?error=sqlerror");
                                    exit();
                                }
                                else
                                {
                                    mysqli_stmt_bind_param($stmt,"s",$itemid);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    $count=0;
                                    while(($row = mysqli_fetch_assoc($result))&&($count<3)){
                                        $count+=1;
                                        $uid = $row['userid'];
                                        $rating=$row['rating'];
                                        $review=$row['review'];
                                        $sql1="SELECT * FROM userdetails where userid=?";
                                        $stmt1 = mysqli_stmt_init($conn);
                                        if(!mysqli_stmt_prepare($stmt1,$sql1))
                                        {
                                            $_SESSION['error-message'] = 'Error!';
                                            header("Location: itempage.php?error=sqlerror");
                                            exit();
                                        }
                                        else
                                        {
                                            mysqli_stmt_bind_param($stmt1,"s",$uid);
                                            mysqli_stmt_execute($stmt1);
                                            $result1 = mysqli_stmt_get_result($stmt1);
                                            if($row1 = mysqli_fetch_assoc($result1))
                                            {
                                                $username = $row1['fullname'];
                                            }
                                            echo "
                                                    <div class=reviewstile>
                                                        <p class=reviewname>$username</p>                          
                                                        <p class='rating'>";
                                                            for($i=1;$i<=$rating;$i++)
                                                            {
                                                                echo "<i class='fa fa-star' aria-hidden='true'></i>";
                                                            }
                                                            for($i=1;$i<=5-$rating;$i++)
                                                            {
                                                                echo "<i class='fa fa-star star-null'  aria-hidden='true'></i>";
                                                            }
                                                            echo "$rating
                                                        </p>
                                                        <p class=reviewcontent>$review</p>
                                                    </div>
                                                ";
                                        }                                           
                                    }
                                }
                                
                            ?> 
                            <p style="float:right"><a href="reviews.php?itemid=<?php echo $itemid ?>">See all reviews</a></p>                   
                        </div>
                    </div>
                    <div><center><button class='addreview-btn' onclick=reviewpopup()>Give a Review</button></center></div>
                </div>
            
        <div class="alsolike">
            <center><h1 class=alsolikeheading>You May Also Like</h1></center>
            <?php
            
            $sql4="SELECT * FROM item WHERE category=? ORDER BY star DESC";
            $stmt4 = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt4,$sql4))
            {
                header("Location: ./homepage.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt4,"s",$category);
                mysqli_stmt_execute($stmt4);
                $result4 = mysqli_stmt_get_result($stmt4);
                while($row4 = mysqli_fetch_assoc($result4)){
                $img1=$row4['img1'];
                $name=$row4['name'];
                $quantityprice=$row4['quantityprice'];
                $qp=explode("\n",$quantityprice);
                $qp=explode(":",$qp[0]);
                $quantity=$qp[0];
                $price=$qp[1];
                $rating=$row4['rating'];
                $star=$row4['star'];
                echo "<a href='itempage.php?itemname=$name'>
                        <div class='recommends'>
                            <img src='./itemimages/$img1' class='item-img'>
                            <div class='itemdesc1'>
                                <p class='item-name'>$name</p>
                                <span class='item-price'>$price</span>
                                <span class='quantity-sml'><span class='label'>Quantity :</span>$quantity</span>
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
                            </div>
                        </div>
                    </a>";
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        ?>        
        </div>
        
        <div class=popupreviewdiv id=popupreview>
            <div class="reviewbox">
                <form autocomplete="off" method="POST" action="../includes/addreviewinc.php?itemid=<?php echo $itemid ?>&itemname=<?php echo $name ?>">

                    <h1 class="heading">Review</h1><span class="cross" onclick="popupreviewclose()">X</span>
                        <div class="rating-section">   
                            <label for="rate" class=rate-label>Rating:</label>
                            <div class="stars" data-rating="3">
                                <span class="ratestar fas fa-star"></span>
                                <span class="ratestar fas fa-star"></span>
                                <span class="ratestar fas fa-star"></span>
                                <span class="ratestar fas fa-star"></span>
                                <span class="ratestar fas fa-star"></span>
                            </div>
                        </div>
                        <div>    
                            <input class="rate" type="hidden" name="rating" value="3">
                        </div>
                    <textarea name="review" id="review" class=text-review  placeholder="Add Review"></textarea>
                    <br>
                    <button  type="submit" class=save-btn name="save-review">Add Review</button>
                </form> 
            </div>
        </div> 
    </div> 
    <script>
        
        //initial setup
        document.addEventListener('DOMContentLoaded', function(){
            let stars = document.querySelectorAll('.ratestar');
            stars.forEach(function(star){
                star.addEventListener('click', setRating); 
            });
            
            let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
            let target = stars[rating - 1];
            target.dispatchEvent(new MouseEvent('click'));
        });

        function setRating(ev){
            let span = ev.currentTarget;
            let stars = document.querySelectorAll('.ratestar');
            let match = false;
            let num = 0;
            stars.forEach(function(star, index){
                if(match){
                    star.classList.remove('rated');
                }else{
                    star.classList.add('rated');
                }
                //are we currently looking at the span that was clicked
                if(star === span){
                    match = true;
                    num = index + 1;
                }
            });
            document.querySelector('.stars').setAttribute('data-rating', num);
            document.querySelector('.rate').setAttribute('value', num);
        }
    </script>
</body>
</html>